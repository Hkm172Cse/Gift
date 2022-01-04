<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\Session;
use App\model\Category;
use DB;
use Auth;

class CategoryController extends Controller
{
    public function view(){
    	$data['catData'] = Category::all();
    	return view('backend.category.view-category',$data);
    }
    public function store(Request $request){
    	$this-> validate($request,[
    		'name' => 'required|unique:categories,name'
    	]);
    	$data  = new Category();
    	$data->name = $request->name;
    	$data ->created_by = Auth::user()->id;
    	$data -> save();


    	return redirect('categories/view') ->with('alert','Data Insert Successfully');
    }
	public function edit($id){
    	$editCat = Category::find($id);
    	return view('backend.Category.edit-Category',compact('editCat'));
    }

	public function update(Request $request,$id){
    	$data = Category::find($id);
    	$this-> validate($request,[
    		'name' => 'required|unique:categories,name'
    	]);
    	$data->name = $request->name;
    	$data-> save();
    	
    	return redirect('categories/view') ->with('alert','Data Updated Successfully');
    }

     public function delete($id){
    	$category = Category::find($id);
    	$category -> delete();
    	return redirect('categories/view') ->with('alert','Data Delete Successfully');
    }
}
