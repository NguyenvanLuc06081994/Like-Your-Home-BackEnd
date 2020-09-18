<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['name','type_house','type_room','address','bedroom','bathroom','description','price','image','customer_id'];
}
