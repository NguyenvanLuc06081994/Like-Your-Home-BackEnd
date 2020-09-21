<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable =['totalPrice', 'status','dateBook','status','orderer','description','customer_id','house_id'];
}
