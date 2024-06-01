<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
