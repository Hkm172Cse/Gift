<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model\Product;
use App\User;
use App\model\Color;
use App\model\Size;
use App\model\Category;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\Shipping;
use App\model\ProductSubImage;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;
use Illuminate\Http\Request;

class frontendController extends Controller
{	

    public function index(){
		return view('frontend.layouts.index');
	}

	public function about(){
		return view('frontend.layouts.about');
		
	}
	public function contact(){
		return view('frontend.layouts.contact');
		
	}
	public function productsView(Request $request){
		$data['catData'] = Product::orderBy('id','desc')->paginate(20);
		$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
		$ting =$request->shipid;
		//session()->put('ship',$ting);
		//session(['ship' => $ting ]);
		//$data['shipid']= session()->get('ship');
		return view('frontend.product.view-product',$data);
		
	}
	public function CategoryMenu( $category_id){
		$data['catData'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
		$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
		$data['shipid']= session()->get('ship');
		return view('frontend.product.category-wise-product',$data);
		
	}
	public function productDetails($id){
		$data['product'] = Product::find($id);
		$data['ship']= Shipping::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->first();
		$data['shipid']= session()->get('ship');
		$data['shipAll']=Shipping::where('id',session()->get('ship'))->first();
		return view('frontend.product.product-details',$data);
		
	}

	public function viewProfile(){
		$data['profile'] = User::where('id',Auth::user()->id)->first();
		return view('frontend.profile.view-profile',$data);
	}

	public function editProfile($id){
		$data['editProfile'] = User::find(Auth::user()->id);
		

		return view('frontend.profile.edit-profile',$data);
	}

	public function updateProfile(Request $request){
		$this-> validate($request,[
    	
    	'UserName' => 'required',
    	'phone' => 'required',
    	'postal' => 'required',
    	'city' => 'required',
    	'addr' => 'required',
    	'gender' => 'required',
    	]);

    	$data = User::find(Auth::user()->id);
    	$data->UserName = 		$request->UserName;
    	$data->phone = 			$request->phone;
    	$data->postal = 		$request->postal;
    	$data->city = 			$request->city;
    	$data->addr = 			$request->addr;
    	$data->gender = 		$request->gender;
    	$img = $request->file('image');
    	if($img){
    		$imgName = $img->getClientOriginalName();
    		$img->move('backend/upload/user/',$imgName);
    		$data['image'] = $imgName;
    	}
    	$data-> save();
    	return redirect('my/view-profile') ->with('alert','Data Updated Successfully');
    }

    public function changePass(){
    $data['profile'] = User::where('id',Auth::user()->id)->first();
    	return view('frontend.profile.password-change',$data);
    }

    public function updatePass(Request $request){
    	if(Auth::attempt(['id' => Auth::user()->id,'password'=>$request->crnt_pass])){
	    	$user = User::find(Auth::user()->id);
	    	$user->password = bcrypt($request->new_pass);
	    	$user->save();
	    	return redirect('my/view-profile') ->with('alert','Password Updated Successfully');
	    }
	    else{
	    	return redirect()->back()->with('alert',"Current Password Dosen't match");
	    }
    }
    


	
}
