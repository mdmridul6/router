<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPackage extends Model
{
    use HasFactory;

    protected $casts = ['status' => 'boolean'];


    protected $appends = ['benifit'];

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function Benifit(): Attribute
    {
        return Attribute::get(fn ($value) => json_decode($value, true));
        return Attribute::set(fn ($value) => json_encode($value));
    }
}
