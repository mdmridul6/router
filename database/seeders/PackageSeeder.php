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

        foreach ($packages as $package){
            $data=new Packages();
            $data->name = $package['name'];
            $data->ipAddress = $package['local-address'];
            $data->save();
        }
    }
}
