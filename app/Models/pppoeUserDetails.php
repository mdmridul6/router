<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pppoeUserDetails extends Model
{
    use HasFactory;
    protected $primaryKey = "pppoe_id";

    public function pppoe(): BelongsTo
    {
        return $this->belongsTo(PPPoE::class, 'id', 'pppoe_id');
    }
}
