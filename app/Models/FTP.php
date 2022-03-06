<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FTP extends Model
{
    use HasFactory;


    public function category(): BelongsTo
    {
        return $this->belongsTo(FTPCategory::class, 'category_id', 'id');
    }
}
