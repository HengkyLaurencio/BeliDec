<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'is_admin',
        'balance'
    ];

    public function shop() : HasOne {
        return $this->hasOne(Shop::class, 'owner_id');
    }

    public function cart() : HasOne {
        return $this->hasOne(Cart::class);
    }

    public function order() : HasMany {
        return $this->hasMany(Order::class);
    }
}
