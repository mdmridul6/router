<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, mixed $name,mixed $name)
 */
class PPPoE extends Model
{
    use HasFactory;


    protected $table = 'pppoe_users';
    /**
     * @var mixed
     */
    private $username, $password, $service, $profile, $active_date, $package_active_date, $package_expire_date, $seller_id;

    protected $dates = [
        'created_at',
        'updated_at',
        'active_date',
        'package_active_date',
        'package_expire_date'
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }
}
