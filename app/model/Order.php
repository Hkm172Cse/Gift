<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment(){
    	return $this->belongsTo(Payment::Class,'payment_id','id');
    }
}
