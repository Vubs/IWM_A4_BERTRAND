<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

    protected $table = "users_addresses";

    protected $fillable = [
        'address-line-1', 'address-line-2', 'city', 'zipcode', 'state'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
