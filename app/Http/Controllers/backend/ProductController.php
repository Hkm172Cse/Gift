<?php

namespace App\Http\Controllers\backend;
use App\model\Product;
use App\model\Color;
use App\model\Size;
use App\model\Category;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\ProductSubImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductController extends Controller
{
    public function view(){
    	$data['catData'] = Product::all();
    	$data['colors'] = Color::all();
    	$data['procolors']= ProductColor::all();
    	
    	return view('backend.product.view-product',$data);
    }

    public function add(){
    	$data['categories'] = Category::all();
    	$data['colors'] = Color::all();
    	$data['sizes'] = Size::all();
    	return view('backend.product.add-product',$data);
    }

    public function store(Request $request){
    	DB::transaction(function() use($request){
    	$this-> validate($request,[
    	'name' => 'required|unique:products,name',
    	'color_id' => 'required',
    	'size_id' => 'required'
    	]);
    	$product  = new Product();
    	$product->name = $request->name;
    	$product->category_id = $request->category_id;
    	$product->price = $request->price;
    	$product->short_desc = $request->short_desc;
    	$product->long_desc = $request->long_desc;
    	$product -> created_by = Auth::user()->id;
    	$img = $request->file('image');
    	if($img){
    		$imgName = $img->getClientOriginalName();
    		$img->move('backend/upload/product_img/',$imgName);
    		$product['image'] = $imgName;
    	}
    	if($product->save()){
    		//sub_image Table Data Insert Code
    		$files=$request->sub_image;
    		if(!empty($files)){
    			foreach ($files as $file) {
    				$imgName =$file->getClientOriginalName();
			    	$file->move('backend/upload/product_img/',$imgName);
			    	$subimage['sub_image'] = $imgName;

			    	$subimage = new ProductSubImage();
			    	$subimage->product_id = $product->id;
			    	$subimage->sub_image = $imgName;
			    	$subimage->save();
    			}
    		
    		}
    		//colors Table Data Insert Code
    		$colors = $request->color_id;
    		if(!empty($colors)){
    			foreach($colors as $color){
    				$pcolor = new ProductColor();
    				$pcolor->product_id = $product->id;
    				$pcolor->color_id = $color;
    				$pcolor->save();

    			}
    		}

    		//sizes Table Data Insert Code
    		$sizes = $request->size_id;
    		if(!empty($sizes)){
    			foreach($sizes as $size){
    				$psize = new ProductSize();
    				$psize->product_id = $product->id;
    				$psize->size_id = $size;
    				$psize->save();

    			}
    		}


    	}
    	else{
    		return redirect()->back()->with('alert','Data not inserted');
    	}
    	$product -> save();
    	});

    	return redirect('products/view') ->with('alert','Data Insert Successfully');
    }


	public function edit($id){
    	$data['editCat'] = Product::find($id);
    	$data['categories'] = Category::all();
    	$data['colors'] = Color::all();
    	$data['sizes'] = Size::all();
    	$data['color_array']=ProductColor::select('color_id')->where('product_id',$data['editCat']->id)->orderBy('id','asc')->get()->toArray();
    	$data['size_array']=ProductSize::select('size_id')->where('product_id',$data['editCat']->id)->orderBy('id','asc')->get()->toArray();
    	return view('backend.product.edit-product',$data);
    }

	public function update(ProductRequest $request,$id){
    	DB::transaction(function() use($request,$id){
    	$this-> validate($request,[
    	
    	'color_id' => 'required',
    	'size_id' => 'required'
    	]);
    	$product  = Product::find($id);
    	$product->name = $request->name;
    	$product->category_id = $request->category_id;
    	$product->price = $request->price;
    	$product->short_desc = $request->short_desc;
    	$product->long_desc = $request->long_desc;
    	$product -> created_by = Auth::user()->id;
    	$img = $request->file('image');
    	if($img){
    		$imgName = date('YmdHi').$img->getClientOriginalName();
    		$img->move('backend/upload/product_img/',$imgName);
    		if (file_exists('backend/upload/product_img/'.$product->image) AND !empty($product->image)){
    			unlink('backend/upload/product_img/'.$product->image);
    		}
    		$product['image'] = $imgName;
    	}
    	if($product->save()){
    		//sub_image Table Data Insert Code
    		$files=$request->sub_image;
    		if(!empty($files)){
    			$subImage= ProductSubImage::where('product_id',$id)->get()->toArray();
    			foreach ($subImage as $value) {
    				if(!empty($value)){
    					unlink('backend/upload/product_img/'.$value['sub_image']);
    				}
    			}
    			ProductSubImage::where('product_id',$id)->delete();
    		}
    		if(!empty($files)){
    			foreach ($files as $file) {
    				$imgName = date('YmdHi').$img->getClientOriginalName();

			    	$file->move('backend/upload/product_img/',$imgName);
			    	$subimage['sub_image'] = $imgName;

			    	$subimage = new ProductSubImage();
			    	$subimage->product_id = $product->id;
			    	$subimage->sub_image = $imgName;
			    	$subimage->save();
    			}
    		
    		}
    		//colors Table Data update Code
    		$colors = $request->color_id;
    		if(!empty($colors)){
    			ProductColor::where('product_id',$id)->delete();
    		}
    		if(!empty($colors)){
    			foreach($colors as $color){
    				$pcolor = new ProductColor();
    				$pcolor->product_id = $product->id;
    				$pcolor->color_id = $color;
    				$pcolor->save();

    			}
    		}

    		//sizes Table Data Insert Code
    		$sizes = $request->size_id;
    		if(!empty($sizes)){
    			ProductSize::where('product_id',$id)->delete();
    		}
    		if(!empty($sizes)){
    			foreach($sizes as $size){
    				$psize = new ProductSize();
    				$psize->product_id = $product->id;
    				$psize->size_id = $size;
    				$psize->save();

    			}
    		}


    	}
    	else{
    		return redirect()->back()->with('alert','Data not inserted');
    	}
    	$product -> save();
    	});

    	return redirect('products/view') ->with('alert','Data Updated Successfully');
    }

     public function delete(Request $request){
    	$product = Product::find($request->id);
    	if (file_exists('backend/upload/product_img/'.$product->image) AND !empty($product->image)){
    			unlink('backend/upload/product_img/'.$product->image);
    	}
		$subImage= ProductSubImage::where('product_id',$product->id)->get()->toArray();
			if(!empty($subImage)){
				foreach ($subImage as $value) {
					if(!empty($value)){
						unlink('backend/upload/product_img/'.$value['sub_image']);
					}
				}
			}
			ProductSubImage::where('product_id',$product->id)->delete();
			ProductColor::where('product_id',$product->id)->delete();
			ProductSize::where('product_id',$product->id)->delete();
			$product->delete();
			return redirect('products/view') ->with('alert','Data Delete Successfully');
    }
    public function details($id){
		$product = Product::find($id);
      
		return view('backend.product.details-product',compact('product'));
	}
}


