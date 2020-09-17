<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['username', 'email', 'phone', 'address', 'password', 'image'];
}
