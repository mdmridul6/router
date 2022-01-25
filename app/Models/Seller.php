<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array, array $array1)
 * @method static insert(array[] $data)
 * @method static find(int $int)
 * @method static where(string $string)
 * @property mixed $id
 * @property mixed $email
 */
class Seller extends Model
{
    use HasFactory;

    public function package(): BelongsToMany
    {
        return $this->belongsToMany(Packages::class, 'seller_packages')->withPivot('amount');
    }

    public function pppoe(): HasMany
    {
        return $this->hasMany(PPPoE::class, 'id', 'seller_id');
    }
}
