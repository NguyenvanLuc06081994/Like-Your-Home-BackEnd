<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['totalPrice', 'checkIn', 'checkOut', 'status', 'order', 'description', 'customer_id', 'house_id'];

    function house() {
        return $this->belongsTo('App\House');
    }
}
