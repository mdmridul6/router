<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\AboutUs;
use App\Models\Packages;
use App\Models\Seller;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;


class PackagesController extends Controller
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function index()
    {
        $client = Connector::Connector();
        $data['packages'] = $client->query('/ppp/profile/print')->read();
        $data['app'] = $this->app;
        return view('backend.admin.packages.list', compact('data'));
    }


    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function create(): JsonResponse
    {
        $client = Connector::Connector();

        $packages = $client->query('/ppp/profile/print')->read();
        $routerPackagesArray = [];
        Schema::disableForeignKeyConstraints();
        Packages::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($packages as $package) {
            array_push($routerPackagesArray, $package["name"]);
            $checkPackage = Packages::where('name', $package["name"])->first();

            if (!isset($checkPackage)) {
                $packageData = new Packages();
                $packageData->name = $package['name'] ?? "";
                $packageData->ipAddress = $package['local-address'] ?? "";
                $packageData->save();
            } elseif (isset($checkPackage)) {
                $checkPackage->name = $package['name'] ?? "";
                $checkPackage->ipAddress = $package['local-address'] ?? "";
                $checkPackage->save();
            }
        }

        $dataPackages = Packages::all();
        $dataPackagesArray = [];
        foreach ($dataPackages as $dataPackage) {
            array_push($dataPackagesArray, $dataPackage->name);
        }
        $deleteTest = array_diff($dataPackagesArray, $routerPackagesArray);

        Packages::whereIn('name', $deleteTest)->delete();
        $data = [
            'status' => "Import Successful",
            'data' => "Import Successful",
            'icon' => 'success'
        ];
        return response()->json($data);
    }

    public function sellerPackage()
    {

        $data['package'] = Seller::with('package')->get();
        $data['app'] = $this->app;
        return view('backend.admin.packages.sellerPackage', compact('data'));
    }

    public function sellerPackageById(Request  $request)
    {
        return response()->json(Seller::with('package')->find($request->id));
    }

    public function sellerPackageAssign($id)
    {

        $data['app'] = $this->app;
        $data['sellerId'] = Seller::with('package')->find($id);
        $data['package'] = Packages::with('seller')->get();



        return view('backend.admin.packages.sellerPackageAssign', compact('data'));
    }

    public function sellerPackageDedicate(Request $request)
    {
        $seller = Seller::find($request->seller);

        //        Marge Package & Amount Array
        $merged = collect($request->input('packages'))->zip($request->input('amounts'))->map(function ($value) {
            return [
                'packages_id' => $value[0],
                'amount' => $value[1]
            ];
        });

        $seller->package()->detach();
        $seller->package()->sync($merged);

        return response()->json(array('status' => "success", 'message' => "Package Assign Successfull"), 200);
    }

    public function sellerPackages()
    {
        $data['seller'] = Seller::where('user_id', Auth::id())->first();
        $data['packages'] = Seller::with('package')->where('id', $data['seller']->id)->first();
        return view('backend.seller.packages.list', compact('data'));
    }
}
