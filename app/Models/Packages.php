<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $ipAddress
 * @property mixed $name
 * @method static where(string $string, mixed $name)
 */
class Packages extends Model
{
    use HasFactory;


    public function seller(): BelongsToMany
    {
        return $this->belongsToMany(Packages::class,'seller_packages',);
    }
}
