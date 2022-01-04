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
                              Product Name
                            </h3>
                            <a type="button" class="btn btn-primary float-right" href="{{route('products.add')}}" >Add Product</a>
                            <div class="modal fade" id="AddUserForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                    </div>
                                    <div class="modal-body">
                                    

                                    <form action="{{route('products.store')}}" id="addForm" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                      <div class="row">
                                        <div class="col-sm-4 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Product Name</label>
                                          <input type="text" class="form-control" name="name" value="">
  											
                                          </div>
                                        </div>
                                        <div class="col-sm-8 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Select Category</label>
                                          <select name="category_id" class="form-control">
                                          	<option value="">Select Category</option>
                                          </select>
  											
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-4 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Color Name</label>
                                          <input type="text" class="form-control" name="name" value="">
  											
                                          </div>
                                        </div>
                                        <div class="col-sm-8 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Select Category</label>
                                          <select name="category_id" class="form-control">
                                          	<option value="">Select Category</option>
                                          </select>
  											
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-sm-1">
                                      <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                      </div>
                                     </form>
                                     </div>
                                  </div>
                                </div>
                              </div>

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

                            <table id="example2" class="table table-bordered table-striped">
                              <thead class="primary">
                              <tr>
                                <th width="6%">SL.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th width="15%">Image</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th width="20%">Action</th>
                               
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($catData as $key => $product)
                              <tr class="{{$product->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product['category']['name']}}</td>
                                <td>{{$product->price}}</td>
                                <td><img class="profile-user-img img-fluid img-square" src="{{(!empty($product->image))?url('backend/upload/product_img/'.$product->image):url('backend/upload/null.png')}}" style="width:100px; height: 100px;"></td>
                                <td>
                                  @php
                                      $s= App\model\ProductSize::where('product_id',$product->id)->get();
                                  @endphp

                                  @foreach($s as $size)
                                    {{$size['size']['name'],}}
                                  @endforeach

                                </td>
                                <td> 
                                  @php
                                    $c= App\model\ProductColor::where('product_id',$product->id)->get();
                                  @endphp

                                  @foreach($c as $rong)
                                    {{$rong['color']['name'],}}
                                  @endforeach
                                </td>

                                <td>
                                <a title="Edit" class="btn btn-primary  btn-md"  href="{{route('products.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
                                 
                                <a title="Details" class="btn btn-success  btn-md"  href="{{route('products.details',$product->id)}}"><i class="fas fa-eye"></i></a>
                                <a title="Delete" id="delete" class="btn btn-danger  btn-md" href="{{route('products.delete',$product->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                              </tr>
                              @endforeach
                              </tbody>
                              <tfoot>
                              <tr>
                                <th width="6%">SL.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th width="10%">Action</th>                             
                              </tr>
                              </tfoot>
                            </table>
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