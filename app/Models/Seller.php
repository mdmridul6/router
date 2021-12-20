<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $array, array $array1)
 * @method static insert(array[] $data)
 * @method static find(int $int)
 */
class Seller extends Model
{
    use HasFactory;

    public function package(): BelongsToMany
    {
        return $this->belongsToMany(Packages::class,'seller_packages');
    }
}
