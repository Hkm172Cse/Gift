<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\model\Order;
use App\model\shipping;
use DB;

class UserController extends Controller
{
    public function view(){
    	$data['allData'] = user::all();
    	return view('backend.users.view-user',$data) ;
    }

    public function add(){
    	$data['allData'] = user::all();
    	return view('backend.users.add-user',$data);
    }


    public function store(Request $request){
    	$this->validate($request,[
    		"UserName" => 'required',
    		"phone" => 'required',
    		"email" => 'required|unique:users,email',
    		"password" => 'required',
    		"role" => 'required',


    	]);
    	$data = new User();
    	$data->UserName = 		$request->UserName;
    	$data->email = 			$request->email;
    	$data->phone = 			$request->phone;
    	$data->password = 		bcrypt($request->password);
    	$data->role = 			$request->default('User')->role;
    	$data-> save();
    	return redirect('users/view') ->with('alert','Data Insert Successfully');


    	
    }

    public function edit($id){
    	$editUser = User::find($id);
    	return view('backend.users.edit-user',compact('editUser'));
    }

    public function update(Request $request,$id){
    	$data = User::find($id);
    	$data->UserName = 		$request->UserName;
    	$data->email = 			$request->email;
    	$data->role = 			$request->role;
    	$data-> save();
    	return redirect('users/view') ->with('alert','Data Updated Successfully');
    }

    public function delete($id){
    	$user = User::find($id);
    	if(file_exists('backend/upload/user'.$user->image) AND !empty($user->image)){
    		unlink('backend/upload/user'.$user->image);
    	}
        DB::delete('delete from orders where user_id = ?',[$id]);
        DB::delete('delete from shippings where user_id = ?',[$id]);
    	$user -> delete();
    	return redirect('users/view') ->with('alert','Data Delete Successfully');
    }



}
