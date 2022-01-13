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
        User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(123456), // password,
            'role' => 'Admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
