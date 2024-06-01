<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    public function shop() : HasOne {
        return $this->hasOne(Shop::class, 'id');
    }

    public function cart() : HasOne {
        return $this->hasOne(Cart::class, 'user_id');
    }
}
