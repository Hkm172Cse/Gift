<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\Product;
use App\model\Color;
use App\model\Size;
use App\model\Category;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\ProductSubImage;
use App\model\Payment;
use App\model\Shipping;
use App\model\Cart;
use App\model\Order;
use App\model\OrderDetail;
use App\Http\Controllers\frontend\Redirect;
use App\Http\Requests\ProductRequest;
use DB;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view(){
     $data['orders'] = Order::all();
     $data['orderdetails'] = OrderDetail::all();
     return view('backend.order.view-order',$data);

    }

    public function UpcomingOrderView(Request $request){
        $date = now();
        $sd = Order::whereMonth('shipping_date',' >' , $date->month)

           ->orWhere(function ($query) use ($date) {

               $query->whereMonth('shipping_date', '= ', $date->month)

                   ->whereDay('shipping_date', '>=' , $date->day);

           })

           ->orderByRaw('DAYOFMONTH(shipping_date)','ASC')

           ->get();

        $data['orders'] = $sd;
        $data['status'] = $request->status;
        return view('backend.order.upcoming-order',$data);
    }



    public function StatusUpcomingOrderView(Request $request){
        if($request->status=="All"){
           return redirect('order/upcoming');
        }

        else{
        $date = now();
         $sd = Order::whereMonth('shipping_date',' >' , $date->month)
           ->orWhere(function ($query) use ($date) {

               $query->whereMonth('shipping_date', '= ', $date->month)

                   ->whereDay('shipping_date', '>=' , $date->day);

           })
           ->where('status',$request->status)

           ->orderByRaw('DAYOFMONTH(shipping_date)','ASC')

           ->get();
           

        $data['orders'] = $sd;
        $data['status'] = $request->status;
        return view('backend.order.upcoming-order-filter',$data);
    }
}



    public function ThreeUpcomingOrderView(){
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(3);
        $order = Order::whereBetween('shipping_date', [$startDate, $endDate])
        ->get();
        $data['orders'] = $order;
        return view('backend.order.upcoming-order-3days',$data);
    }

    public function UpcomingOrderViewStatus(Request $request){
        if($request->status=="All"){
           return redirect('order/upcoming/3-days');
        }
        else{

        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(3);
        $order = Order::whereBetween('shipping_date', [$startDate, $endDate])
        ->where('status',$request->status)
        ->get();
        $data['status'] = $request->status;
        $data['orders'] = $order;
        return view('backend.order.upcoming-order-3days-status',$data);
        }
        
    }



    public function UpdateStatus(Request $request,$id){
     $data = Order::find($id);
     $data->status = $request->status;
     $data->save();
     return redirect()->back();

    }
}
