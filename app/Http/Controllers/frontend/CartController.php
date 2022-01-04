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
use App\model\Shipping;
use App\model\ShipIdPass;
use App\Http\Requests\ProductRequest;
use DB;
use Auth;
use session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
    	$this->validate($request,[
    		'size_id' => 'required',
    		'color_id' =>  'required'
    	]);
    	$product = Product::where('id',$request->product_id)->first();
        $cartItem1 = Cart::where([                        
            ['shipping_id', '=', $request->shipping_id],
            ['product_id', '=', $product->id],
            ['color_id', '=', $request->color_id],
            ['size_id', '=', $request->size_id],
            
        ])->first();



        if($cartItem1){
            $cartfind = Cart::find($cartItem1->id);
            $cartfind->quantity = $request->quantity+$cartItem1->quantity;
            $cartfind->save();
        }
       
        else{
            $cart = new Cart();
            $cart->shipping_id = $request->shipping_id;
            $cart->product_id = $product->id;
            $cart->product_name = $product->name;
            $cart->product_image = $product->image;
            $cart->color_id = $request->color_id;
            $cart->size_id = $request->size_id;
            $cart->quantity = $request->quantity;
            $cart->price = $product->price; 
            $cart->save(); 
        }

    	return redirect()->back()->with('alert','Add Item Successfully');

    	
    }

    public function additem(Request $request){
    	$ting  = $request-> shipid;
    	return redirect('my/products/view');
    }

    public function delete($id){
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function alldelete($id){
        DB::delete('delete from carts where shipping_id = ?',[$id]);
        return redirect()->back()->with('alert','Data Delete Successfully');
    }

    public function session_set(Request $request){

        session()->put('ship',$request->shipping_id);
        return redirect()->back();
    }

    public function session_shipping(Request $request){
        session()->put('ship',$request->shipid);
        return redirect('my/products/view');
    }
}
