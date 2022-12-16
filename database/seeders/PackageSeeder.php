<?php

namespace Database\Seeders;

use App\Helper\Connector;
use App\Models\Packages;
use Illuminate\Database\Seeder;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use Illuminate\Support\Facades\Schema;


class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BadCredentialsException
     * @throws ClientException
     * @throws ConfigException
     * @throws ConnectException
     * @throws QueryException
     */
    public function run()
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
    }
}
