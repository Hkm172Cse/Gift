<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\Session;
use App\model\Color;
use DB;
use Auth;


class ColorsController extends Controller
{
    public function view(){
    	$data['catData'] = Color::all();
    	return view('backend.color.view-color',$data);
    }
    public function store(Request $request){
    	$this-> validate($request,[
    		'name' => 'required|unique:colors,name'
    	]);
    	$data  = new Color();
    	$data->name = $request->name;
    	$data -> created_by = Auth::user()->id;
    	$data -> save();


    	return redirect('colors/view') ->with('alert','Data Insert Successfully');
    }
	public function edit($id){
    	$editCat = Color::find($id);
    	return view('backend.color.edit-color',compact('editCat'));
    }

	public function update(Request $request,$id){
    	$data = Color::find($id);
    	$this-> validate($request,[
    		'name' => 'required|unique:colors,name'
    	]);
    	$data->name = $request->name;
    	$data-> save();
    	
    	return redirect('colors/view') ->with('alert','Data Updated Successfully');
    }

     public function delete($id){
    	$category = Color::find($id);
    	$category -> delete();
    	return redirect('colors/view') ->with('alert','Data Delete Successfully');
    }
}
