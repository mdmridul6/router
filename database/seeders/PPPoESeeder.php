<?php

namespace Database\Seeders;

use App\Helper\Connector;
use App\Models\PPPoE;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PPPoESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Connector::Connector();
        $data = $client->query('/ppp/secret/print')->read();
        foreach ($data as $users) {
            $pppoe = new PPPoE();
            $pppoe->username = $users['name'];
            $pppoe->password = $users['password'];
            $pppoe->service = $users['service'];
            $pppoe->profile = $users['profile'];
            $pppoe->active_date = Carbon::now();
            $pppoe->package_active_date = ($users['profile'] !== "Block" ? Carbon::now() : null);
            $pppoe->package_expire_date = ($users['profile'] !== "Block" ? Carbon::now()->addMonth(1) : null);
            $pppoe->seller_id = null;
            $pppoe->status = ($users['profile'] == "Block" ? false : true);
            $pppoe->save();
        }
    }
}
