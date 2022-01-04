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
use App\model\Shipping;
use App\model\Cart;
use App\model\Order;
use App\Http\Controllers\frontend\Redirect;
use App\Http\Requests\ProductRequest;
use DB;
use Auth;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function create(){
    	return view('frontend/shipping/create-shipping');
    }


    public function store(Request $request){
    	$this->validate($request,[
    		"name" => 'required',
    		"age" => 'required',
    		"gender" => 'required',
    		"mobile" => 'required',
    		"city" => 'required',
    		"postal" => 'required',
    		"address" => 'required',
            
    	]);
    	$shipping = new Shipping();
    	$shipping->user_id = Auth::user()->id;
    	$shipping->name    = $request->name;
    	$shipping->age    = $request->age;
    	$shipping->gender    = $request->gender; 
    	$shipping->email    = $request->email;
    	$shipping->mobile    = $request->mobile;
    	$shipping->city    = $request->city;
    	$shipping->postal    = $request->postal;
    	$shipping->address    = $request->address;
    	$shipping->relation    = $request->relation;
        $shipping->shipping_time    = $request->shipping_time;
        $shipping->shipping_date    = $request->shipping_date;
    	$shipping->note    = $request->note;
    	$shipping->save();

    	return view('frontend/shipping/create-shipping')->with('alert','Shipping Created Successfully');
    }

    public function details($id){
        $data['shipping'] = Shipping::find($id);
        $cart_table = Cart::all();
        $data['cart'] = Cart::where('shipping_id',$id)->get();
        $data['orders'] = Order::where('shipping_id',$id)->get();
        return view('frontend.shipping.details-shipping',$data);
    }

    public function invoice(Request $request,$id) {
   
        $data['order'] = Order::find($id);
        $ship = $request->shipping_id;
        $data['shipping'] = Shipping::where('id',$ship)->first();
        $data ['orderDetails'] = OrderDetail::where('order_id',$id)->get();
        return view('frontend.shipping.invoice',$data);
    }

    public function edit(Request $request, $id){
        $data['editShipping'] = Shipping::find($id);
        return view('frontend.shipping.edit-shipping',$data);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            "name" => 'required',
            "age" => 'required',
            "gender" => 'required',
            "mobile" => 'required',
            "city" => 'required',
            "postal" => 'required',
            "address" => 'required',
        ]);
        $shipping = Shipping::find($id);
        $shipping->name    = $request->name;
        $shipping->age    = $request->age;
        $shipping->gender    = $request->gender; 
        $shipping->email    = $request->email;
        $shipping->mobile    = $request->mobile;
        $shipping->city    = $request->city;
        $shipping->postal    = $request->postal;
        $shipping->address    = $request->address;
        $shipping->relation    = $request->relation;
        $shipping->note    = $request->note;
        $shipping->save();

        return redirect('my/shipping/create')->with('alert','Data Updated Successfully');
    }


    
    public function ShippingDestroy($id){
        $data = Shipping::find($id);
        $data->delete();
        return redirect()->back();
    }

    
  
}
