<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'access_token_expire_at' => 'datetime'
    ];

    public function owner()
    {
        return $this->hasOne(User::class);
    }

    public function products(){

    }
}
