<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [[
            'id' => 1,
            'userName' => "mridul",
            'password' => Hash::make(123456),
            'fullName' => "mridul",
            'nid' => "123456789123456789",
            'phone' => "01988173070",
            'mobile' => "01794798227",
            'email' => "mdmridul608@gmail.com",
            'address' => "mawna",
            'image' => 'e/locla',
            'balance' => "200"

        ],[
        'id' => 2,
        'userName' => "test2",
        'password' => Hash::make(123456),
        'fullName' => "test2",
        'nid' => "123456789123456789",
        'phone' => "01988173071",
        'mobile' => "01794798228",
        'email' => "mdmridul60@gmail.com",
        'address' => "mawna",
        'image' => 'e/locla',
        'balance' => "200"

    ]
        ];
        Seller::insert($data);
    }
}
