<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'id');
    }
}