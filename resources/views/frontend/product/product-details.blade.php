@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <div class="content-header">
      
    </div>
		<section class="content">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-12">
		        <div class="card card-primary">
		          <div class="card-header">
		            <h4 class="card-title">Product Details</h4>
		          </div>
		            @if (Session::has('alert'))

                          <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('alert') }}
                          </div>
                         @endif

		          <div class="card-body">
		            <div class="row">
		            <div class="col-12 col-sm-6">
		              <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
		              <div class="col-12">
		              	<img class="product-image img-fluid img-square" src="{{(!empty($product->image))?url('backend/upload/product_img/'.$product->image):url('backend/upload/null.png')}}">
		               
		              </div>
		              <div class="col-12 product-image-thumbs">
		              	@php
		                $s= App\model\ProductSubImage::where('product_id',$product->id)->get();
		              @endphp
		               @foreach($s as $subimg)

		                <div class="product-image-thumb active"><img src="{{url('backend/upload/product_img/'.$subimg->sub_image)}}"></div>

		                @endforeach
		           
		              </div>
		            </div>
		            
				            <div class="col-12 col-sm-6">


				            	<h3>{{$shipid}} </h3>
				              <h3 class="my-3">{{$product->name}}</h3>
				              <p>{{$product->short_desc}}</p>

				              

				              <hr>
				             <form action="{{route('customer.cart.store')}}" method="POST">
		            		 @csrf
				              @php
				                $c= App\model\ProductColor::where('product_id',$product->id)->get();

				              @endphp
				              	<input type="hidden" name="product_id" value="{{$product->id}}" >
				            	<input type="hidden" name="shipping_id" value="{{$shipid}}" >
				            	
				            	
				              
				              <div class="row">
				              	<div class="form-group col-sm-4">
		                        <label>Select color</label>

		                        <select  name="color_id" class="form-control select2"  required>
		                        <option selected="" disabled="">Select a color</option>
		                        @foreach($c as $rong)
		                       
		                        <option value="{{$rong->id}}">{{$rong['color']['name']}}</option>
		                        @endforeach
		                        </select>
		                        <font color="red">{{($errors->has('color_id'))?($errors->first('color_id')):''}}</font>
		                        
		                       </div>
				              </div>
				            

				              
				              @php
				             	$sizes= App\model\ProductSize::where('product_id',$product->id)->get();
				           	  @endphp
				           	  
				              <div class="row">
				              	<div class="form-group col-sm-4">
		                        <label>Select size</label>
		                        <select  name="size_id" class="form-control select2"  required>
		                        <option selected="" disabled="">Select a size</option>
		                         @foreach($sizes as $size)
		                         
		                        <option value="{{$size->id}}">{{$size['size']['name']}}</option>
		                        @endforeach
		                        </select>
		                        <font color="red">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</font>
		                        
		                       </div>

				              </div>				             
		                    
		                   
		              <div class="row">
		              	<div class=" form-group bg-gray py-2 px-3 ">
		                <h2 class="mb-0">
		                  <span>&#2547;</span>{{'  '.$product->price}}
		                </h2>
		                
		              </div>
		              </div>
		           		<div class="row">
			              	<div class="quantity">
							    <a href="#" class="float-left quantity__minus"><span>-</span></a>
							    <input name=" quantity" type="text" class="float-left quantity__input" value="1">
							    <a href="#" class="float-left quantity__plus"><span>+</span></a>
	  						</div>
						</div>
						@if(!empty($ship )&& $ship->status=='incomplete')
	        			
	        			<div class="row ">
	                        <div class="form-group  mt-2">
	                        	@if(!empty($shipid))
	                            <button type="submit" value="submit" class=" btn btn-primary">Add this item for <span>{{$shipAll->name}}</span></button>
	                            @endif
	                        </div>
	                    </div>
	        			@endif
		              	
					</form>
		              

		            </div>

		          </div>
		           <div class="row mt-4">
			            <nav class="w-100">
			              <div class="nav nav-tabs" id="product-tab" role="tablist">
			                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
			                
			              </div>
			            </nav>
			            <div class="tab-content p-3" id="nav-tabContent">
			              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$product->long_desc}} </div>

                    
                      
			              
			          </div>

		        	</div>

		          </div>
		          

		        </div>
		        
		      </div>
		     
		    </div>
		  </div><!-- /.container-fluid -->
		</section>
              
</div><!-- /.row (main row) -->
  
@endsection