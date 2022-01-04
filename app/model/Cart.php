<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function shipping(){
    	return $this->belongsTo(Shipping::class,'shipping_id','id');
    }
}
