<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model\Product;
use App\model\Color;
use App\model\Size;
use App\model\Category;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\ProductSubImage;
use App\model\OrderDetail;
use App\model\Payment;
use App\model\Cart;
use App\model\Order;
use App\model\Shipping;
use App\Http\Requests\ProductRequest;
use DB;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function paymentStore(Request $request){
    	$this->validate($request,[
    		'payment_method' => 'required',
    		'trx_num' =>  'required',
    		'shipping_id' =>  'required',
    	]);
    	$payment =new Payment();
    	$payment->payment_method = $request->payment_method;
    	$payment->trx_num = $request->trx_num;
    	$payment-> save();

    	$shipping_date= Shipping::where('id',$request->shipping_id)->first();
    	
    	$order = new Order();
    	$order->user_id = Auth::user()->id;
    	$order->shipping_id= $request->shipping_id;
    	$order->shipping_date= $shipping_date->shipping_date;
    	$order->payment_id= $payment->id;
    	$order_data = Order::orderby('id','desc')->first();

			if($order_data==null){
				$first = '0';
				$order_no = $first+1;

			}
			else{
				$order_data = Order::orderby('id','desc')->first()->order_no;
				$order_no=$order_data+1;
			}
		$order->order_no = $order_no;
		$order->order_total = $request ->order_total;
		$order->status = 'Pending';
		$order->save();


		$carts = Cart::where('shipping_id',$request->shipping_id)->get();
		foreach ($carts as $cart) {
			$order_details = new OrderDetail();
			$order_details->order_id= $order->id;
			$order_details->product_id = $cart->product_id;
			$order_details->product_name = $cart->product_name;
			$order_details->product_image = $cart->product_image;
			$order_details->color_id = $cart->color_id;
			$order_details->size_id = $cart->size_id;
			$order_details->quantity = $cart->quantity;
			$order_details->price = $cart->price;
			$order_details->save();
		}
		
		DB::delete('delete from carts where shipping_id = ?',[$request->shipping_id]);
		$data['order'] = Order::find($order->id);
        $ship = $request->shipping_id;
        $data['shipping'] = Shipping::where('id',$ship)->first();
        $data ['orderDetails'] = OrderDetail::where('order_id',$order->id)->get();
        return redirect()->back();
        return view('frontend.shipping.order-summary',$data)->with('alert','Order Created Successfully');
       
		

	}

	public function view(){
	$user_id=Auth::user()->id;
    $data['orders'] = Order::where('user_id',$user_id)->get();
    $data['orderdetails'] = OrderDetail::all();
    return view('backend.home',$data);

    }

}


