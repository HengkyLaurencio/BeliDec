<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'order_item_id',
        'stars',
        'comments',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function orderItem(): HasMany {
        return $this->hasMany(OrderItem::class);
    } 
    
}