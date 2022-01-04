@extends('backend/master')
@section('content')
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
              <li class="breadcrumb-item active">edit product</li>
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
                              Edit Product
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
                                  {{$errors}}
                                </div>
                            @endif
                                    <form action="{{route('products.update',$editCat->id)}}" id="addForm" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                      <div class="row">
                                        <div class="col-sm-4 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Product Name</label>
                                          <input type="text" class="form-control" name="name" value="{{@$editCat->name}}">
                        
                                          </div>
                                        </div>
                                        <div class="col-sm-4 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Select Category</label>
                                           <select name="category_id" class="form-control">
                                            <option selected="" disabled="" >Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($editCat->category_id==$category->id)?"selected":""}}> {{$category->name}} </option>
                                            @endforeach
                                          </select>
                        
                                          </div>
                                        </div>
                                        <div class="col-sm-4 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                            <label>Select size</label>
                                            <select name="size_id[]" class="form-control select2" multiple="multiple" required>
                                             @foreach($sizes as $size)
                                            <option value="{{$size->id}}"{{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                                            @endforeach
                                            </select>
                                            <font color="red">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</font>
                        
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        
                                        <div class="col-sm-2 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Select Color</label>
                                          <select name="color_id[]" class="form-control select2" multiple="multiple" required="">
                                          
                                            @foreach($colors as $color)
                                            <option value="{{$color->id}}"{{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}}>{{$color->name}}</option>
                                            @endforeach
                                          </select>
                                          <font color="red">{{($errors->has('color_id'))?($errors->first('color_id')):''}}</font>
                        
                                          </div>
                                        </div>

                                        <div class="col-sm-2 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Price</label>
                                          <input type="number" class="form-control" name="price" value="{{@$editCat->price}}">
                                          <font color="red">{{($errors->has('price'))?($errors->first('price')):''}}</font>
                                          </div>
                                        </div>
                                        <div class="col-sm-3 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Image</label>
                                          <input type="file" class="form-control" name="image" id="image" value="">
                          
                                          </div>
                                        </div>
                                        <div class="col-sm-2 ">
                                        <img id="liveImg" class="profile-user-img img-fluid img-square" src="{{(!empty($editCat->image))?url('backend/upload/product_img/'.$editCat->image):url('backend/upload/null.png')}}" style="width:150px; height: 150px;">
                                          
                                        </div>
                                      
                                      <div class="col-sm-3 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Sub Images</label>
                                          <input type="file" class="form-control" name="sub_image[]"  value="" multiple="">
                          
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        
                                        <div class="col-sm-12 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Short Description</label>
                                          
                                            <textarea  class="form-control" name="short_desc" value="" rows="2">{{@$editCat->short_desc}}</textarea>
                                            
                                          </div>
                                        </div>

                                      </div>
                                      <div class="row">
                                        
                                        <div class="col-sm-12 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Long Description</label>
                                          
                                            <textarea id="summernote" class="form-control" name="long_desc" value="" rows="4">{{@$editCat->long_desc}}</textarea>
                                            
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-sm-1">
                                      <button type="submit" value="submit" class="btn btn-primary">Update</button>
                                      </div>
                                      </div>
                                     </form>
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
      category_id: {
        required: true,
  
      },
      short_desc: {
        required: true,
  
      },
      long_desc: {
        required: true,
  
      },
      price: {
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