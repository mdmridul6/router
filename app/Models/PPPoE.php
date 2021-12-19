<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPPoE extends Model
{
    use HasFactory;


    protected $table = 'pppoe_users';
    /**
     * @var mixed
     */
    private $username, $password, $service, $profile, $active_date, $package_active_date, $package_expire_date, $seller_id;

}
