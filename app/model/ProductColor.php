<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public function color(){
    	return $this->belongsTo(Color::class,'color_id','id');
    }
}
