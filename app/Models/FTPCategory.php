<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FTPCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function ftp(): HasMany
    {
        return $this->hasMany(FTP::class, 'category_id', 'id');
    }
}
