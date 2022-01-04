@extends('backend/master')
@section('content')
@php

@endphp
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " > 
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- User List -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <section class="col-md-12 ">
                        <div class="card">
                          <div class="card-header">
                        
                            <h3 class="card-title">
                              <i class="fas fa-user mr-1"></i>
                              Product Details
                              
                            </h3>
                            <a type="button" class="btn btn-primary float-right" href="{{route('products.view')}}" >View Products</a>
                            

                          </div><!-- /.card-header -->
                          
                      </div><!-- /.card-body -->
                      <div class="card" >
                          <div class="card-body" >
                           
                            <font color="red"></font>
                            @if (Session::has('errors'))

                                <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  {{$errors->first('name')}}
                                </div>
                            @endif

                            @if (Session::has('alert'))

                              <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('alert') }}
                              </div>
                            @endif
                           <section class="content">

      <!-- Default box -->
                						      <div class="card card-solid">
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
                						              <h3 class="my-3">{{$product->name}}</h3>
                						              <p>{{$product->short_desc}}</p>

                						              <hr>
                						              <h4>Available Colors</h4>
                						              @php
                			                            $c= App\model\ProductColor::where('product_id',$product->id)->get();
                			                          @endphp
                			                          @foreach($c as $rong)
                						              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                						                
                						                <label class="btn btn-default text-center">
                						                  
                						                  
                                                  		{{$rong['color']['name']}}
                						                  
                						                </label>
                						                
                						              </div>
                						              @endforeach

                						              <h4 class="mt-3">Size </h4>
                						              @php
                	                                 	$s= App\model\ProductSize::where('product_id',$product->id)->get();
                	                               	  @endphp
                	                               	  @foreach($s as $size)
                						              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                						                <label class="btn btn-default text-center">
                						                 
                						                  {{$size['size']['name']}}
                						                </label>
                						               
                						              </div>
                						              @endforeach

                						              <div class="bg-gray py-2 px-3 mt-4">
                						                <h2 class="mb-0">
                						                  <span>&#2547;</span>{{'  '.$product->price}}
                						                </h2>
                     
                						                
                						              </div>

                						              

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
                						        <!-- /.card-body -->
                						      </div>
						      <!-- /.card -->

						    </section>

                            
                          </div>

                        </div>
                     <!-- /.card-body -->

                      </section>   
                    </div>
                  </div><!-- /.container-fluid -->
              </section>
          <!-- right col -->
</div><!-- /.row (main row) -->
  <!-- jQuery Form Validation -->
        
<script>
$(function () {
  $.validator.setDefaults({
    
  });
  $('#addForm').validate({
    rules: {

      name: {
        required: true,
  
      },

    },
    messages: {
      name: {
        required: "Please enter a category name",
        
      },
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection