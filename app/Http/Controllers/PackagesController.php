<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\AboutUs;
use App\Models\Packages;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        foreach ($packages as $package) {
            $checkPackage = Packages::where('name', $packages["name"])->first();
            if (is_null($checkPackage)) {
                $packageData = new Packages();
                $packageData->name = $package['name'];
                $packageData->ipAddress = $package['local-address'];
                $packageData->save();
            } elseif ($checkPackage->name == $package['name']) {
                $packageData = new Packages();
                $packageData->name = $package['name'];
                $packageData->ipAddress = $package['local-address'];
                $packageData->save();
            }
        }
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


    public function sellerPackageAssign()
    {
        $data['app'] = $this->app;
        $data['seller'] = Seller::all();
        $data['package'] = Packages::all();


        return view('backend.admin.packages.sellerPackageAssign', compact('data'));
    }

    public function sellerPackageDedicate(Request $request): RedirectResponse
    {

        $seller = Seller::find($request->seller);

        //        Marge Package & Amount Array
        $merged = collect($request->input('packages'))->zip($request->input('amounts'))->map(function ($value) {
            return [
                'packages_id' => $value[0],
                'amount' => $value[1]
            ];
        });
        $seller->package()->sync($merged);
        Session::flash('message', "Seller Package Assign Successful");
        return redirect()->route('admin.package.sellerPackage');
    }

    public function sellerPackages()
    {
        $packages = Seller::with('package')->where('user_id', Auth::id())->get();
        return view('backend.seller.packages.list', compact('packages'));
    }
}
