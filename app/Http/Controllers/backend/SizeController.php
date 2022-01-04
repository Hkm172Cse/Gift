<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Size;
use DB;
use Auth;

class SizeController extends Controller
{
    public function view(){
    	$data['catData'] = Size::all();
    	return view('backend.size.view-size',$data);
    }
    public function store(Request $request){
    	$this-> validate($request,[
    		'name' => 'required|unique:sizes,name'
    	]);
    	$data  = new Size();
    	$data->name = $request->name;
    	$data -> created_by = Auth::user()->id;
    	$data -> save();


    	return redirect('size/view') ->with('alert','Data Insert Successfully');
    }
	public function edit($id){
    	$editCat = Size::find($id);
    	return view('backend.size.edit-size',compact('editCat'));
    }

	public function update(Request $request,$id){
    	$data = Size::find($id);
    	$this-> validate($request,[
    		'name' => 'required|unique:sizes,name'
    	]);
    	$data->name = $request->name;
    	$data-> save();
    	
    	return redirect('size/view') ->with('alert','Data Updated Successfully');
    }

     public function delete($id){
    	$category = Size::find($id);
    	$category -> delete();
    	return redirect('size/view') ->with('alert','Data Delete Successfully');
    }
}
