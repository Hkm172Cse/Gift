<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;

class mypayment_Controller extends Controller
{
   public function payment_view_method(){
    $record = DB::table('products')->get();
            
        return view('payment_view', ['record'=>$record]);
   } 
}
