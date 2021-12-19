<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $name)
 */
class PPPoE extends Model
{
    use HasFactory;


    protected $table = 'pppoe_users';
    /**
     * @var mixed
     */
    private $username, $password, $service, $profile, $active_date, $package_active_date, $package_expire_date, $seller_id;

}
