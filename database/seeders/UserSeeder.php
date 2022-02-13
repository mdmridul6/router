<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2022-01-31 03:42:21',
                'password' => '$2y$10$tx8zFlDHsmOzSxn0rVCx8uB1/VlexNkwhZRMCRLHUdwl59yrZq9ge',
                'role' => 'Admin'
            ],

            [
                'name' => 'Mahfujur Rahman Mamun',
                'email' => 'mahfujurahmanmamun@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$P6kx07F/HUfIzWgA0fR/N.IuRWKiQrWUer4j6IghUn0oTn2.HR0yK',
                'role' => 'Seller'
            ],

            [
                'name' => 'Showrov Hasan Pranto',
                'email' => 'showrovhasanpranto@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$HYzyeZi8rJ65sM1IJ3BZN.YJcZhe3xdKkUwgnwZgpfCcoo/anp1e6',
                'role' => 'Seller'
            ],

            [
                'name' => 'Himel',
                'email' => 'himelmahmud584@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$Bn61Tnh6ZPKsu1LpTHxF.ek7mF61e.vawpXWwjRMezz4RMPmxRKzW',
                'role' => 'Seller'
            ],

            [
                'name' => 'Sajib Ahamed',
                'email' => 'sajibahamed101@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$qipsL0U82KULmnps7v448ucGaP/Il8X3rHRudif1mLDp9G0gjtt7i',
                'role' => 'Seller'
            ],

            [
                'name' => 'MD. Shafiqul Islam Sarkar',
                'email' => 'rifatsarkar01728@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$VM.9EvhfNyF5CwLTjqZgTuHqV6RSgpiJnRmTKGnft4mu2sbkSgQ5m',
                'role' => 'Seller'
            ],

            [
                'name' => 'MD. Shafiqul Islam Sarkar',
                'email' => 'abc@gmacil.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$dm.6yJcO4MoL2ajhvx3E8ekTh.rTTYhWvGdb.ccZzZFtFi.7UreUW',
                'role' => 'Seller'
            ],

            [
                'name' => 'Mehedi Hasan',
                'email' => 'mahedisheikh2@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$LoK6kg9U/jXdORGBgNNGF.p4yaoFrPVgoImhypK5xYNRj0Gj58ySG',
                'role' => 'Seller',
            ],

            [
                'name' => 'Shopon Islam',
                'email' => 'amishoponislam2020@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$0WTS2VHt.sJr0AT8TyPfuuYa6u0T5.LFYVT8gMnMmSqZjXDu/WG1C',
                'role' => 'Seller'
            ],
        ];

        User::insert($users);
    }
}
