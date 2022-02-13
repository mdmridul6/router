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

        $data = [
            [
                'id' => 2,
                'userName' => 'mrmamun',
                'password' => 'alif1122',
                'fullName' => 'Mahfujur Rahman Mamun',
                'nid' => 19913318647000461,
                'phone' => '01929677886',
                'mobile' => NULL,
                'email' => 'mahfujurahmanmamun@gmail.com',
                'address' => "Mawna-Bazar,Sreepur,Gazipur",
                'image' => '/uploads/images/_1643649661.jpg',
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 2,


            ],

            [
                'id' => 3,
                'userName' => 'showrov',
                'password' => '55665566',
                'fullName' => 'Showrov Hasan Pranto',
                'nid' => 0,
                'phone' => '01870199480',
                'mobile' => NULL,
                'email' => 'showrovhasanpranto@gmail.com',
                'address' => "Abadullah Mor,Mawna-Bazar,Sreepur,Gazipur",
                'image' => '/uploads/images/_1643389214.jpg',
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 3,


            ],

            [
                'id' => 4,
                'userName' => 'himel',
                'password' => 'himel584',
                'fullName' => 'Himel',
                'nid' => 12222222,
                'phone' => '01307492427',
                'mobile' => NULL,
                'email' => 'himelmahmud584@gmail.com',
                'address' => "Koroitola,Mawna-Bazar,Sreepur,Gazipur",
                'image' => '/uploads/images/_1643391694.jpg',
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 4,


            ],

            [
                'id' => 5,
                'userName' => 'sajib',
                'password' => '313326339',
                'fullName' => 'Sajib Ahamed',
                'nid' => 1212121212121,
                'phone' => '01719383734',
                'mobile' => NULL,
                'email' => 'sajibahamed101@gmail.com',
                'address' => "Mawna-Chowrasta,Sreepur,Gazipur",
                'image' => '/uploads/images/_1643391760.jpg',
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 5,


            ],

            [
                'id' => 6,
                'userName' => 'shafiquel',
                'password' => 'shafiquel@321',
                'fullName' => 'MD. Shafiqul Islam Sarkar',
                'nid' => 19853318685,
                'phone' => '01711712226',
                'mobile' => NULL,
                'email' => 'abc@gmacil.com',
                'address' => "MulaedTengra,Sreepur,Gazipur",
                'image' => NULL,
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 7,
            ],

            [
                'id' => 7,
                'userName' => 'mehedi',
                'password' => 'mehedi@321',
                'fullName' => 'Mehedi Hasan',
                'nid' => 1954491021,
                'phone' => '01789471393',
                'mobile' => NULL,
                'email' => 'mahedisheikh2@gmail.com',
                'address' => "Mawna-Bazar Road,Sreepur,Gazipur",
                'image' => NULL,
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 8,


            ],

            [
                'id' => 8,
                'userName' => 'shopon',
                'password' => 'shopon##',
                'fullName' => 'Shopon Islam',
                'nid' => 5559757348,
                'phone' => '01777856887',
                'mobile' => NULL,
                'email' => 'amishoponislam2020@gmail.com',
                'address' => "Koroitola-Bazar,Sreepur,Gazipur",
                'image' => NULL,
                'balance' => 0,
                'deactive_after' => NULL,
                'user_id' => 9,


            ]
        ];


        Seller::insert($data);
    }
}
