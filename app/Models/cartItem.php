<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo {
        return $this->BelongsTo(Product::class);
    }
}
