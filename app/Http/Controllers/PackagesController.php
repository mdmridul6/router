<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\Packages;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;
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
    public function index(){
        $client=Connector::Connector();
        $packages = $client->query('/ppp/profile/print')->read();
        return view('backend.packages.list',compact('packages'));
    }


    public function create(): JsonResponse
    {
        $client = Connector::Connector();
        $packages = $client->query('/ppp/profile/print')->read();
        foreach ($packages as $package) {
            $checkPackage=Packages::where('name',$packages["name"])->first();
            if (is_null($checkPackage)){
                $packageData = new Packages();
                $packageData->name = $package['name'];
                $packageData->ipAddress = $package['local-address'];
                $packageData->save();
            }elseif($checkPackage->name == $package['name']){
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

    public function sellerPackage(){
        dd(Packages::with(['seller'])->get());
        return view('backend.packages.sellerPackage');
    }

}
