@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " > 
            <h1 class="m-0 text-dark">Edit Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                          <div class="card-header bg-gradient-primary">
                            <h3 class="card-title">
                              <i class="fas fa-user mr-1"></i>
                              Edit Profile
                            </h3>
                          </div><!-- /.card-header -->
                          
                      <!-- /.card-body -->
                     
                          <div class="card-body" >
                              <font color="red"></font>
                            @if (Session::has('errors'))

                                <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  {{$errors}}
                                </div>
                            @endif
                                <form action="{{route('customer.update.profile')}}" id="addForm" method="post"  enctype="multipart/form-data">
                                    {{csrf_field()}}
                                  
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" id="UserName" class="form-control" name="UserName" value="{{$editProfile->UserName}}" >

                                          </div>
                                        </div>
                                         <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>Select Gender</label>
                                            <select name="gender" id="gender" class="custom-select" > 
                                              <option selected="" disabled="">Select a Gender</option>
                                              <option {{($editProfile->gender=="Male")?"selected":""}}>Male</option>
                                              <option {{($editProfile->gender=="Female")?"selected":""}}>Female</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>Mobile</label>
                                          <input type="text" id="phone" class="form-control" name="phone" value="{{$editProfile->phone}}" >
                                          </div>
                                        </div>
                                        
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>City</label>
                                          <input type="text" id="city" class="form-control" name="city" value="{{$editProfile->city}}" >
                                          </div>
                                        </div>
                                         <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" id="city" class="form-control" name="postal" value="{{$editProfile->postal}}" >
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>Address</label>
                                          <input type="text" id="addr" class="form-control" name="addr" value="{{$editProfile->addr}}" >
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <div class="row">
                                        
                                        <div class="col-sm-3 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Image</label>
                                          <input type="file" class="form-control" name="image" id="image" value="">
                          
                                          </div>
                                        </div>

                                        <div class="col-sm-2 ">
                                        <img id="liveImg" class="profile-user-img img-fluid img-square" src="{{(!empty($editProfile->image))?url('backend/upload/user/'.$editProfile->image):url('backend/upload/null.png')}}" style="width:150px; height: 150px;">
                                          
                                        </div>
                                      </div>
                                     
                                      <div class="row">
                                          <div class="col-sm-1">
                                            <button type="submit" value="Update" class="btn btn-primary">Update</button>
                                          </div>
                                      </div>
                               	</form>
                                
                               </div>
                               </div>
                              </div>
                            </div>

                          </div>
                     <!-- /.card-body -->
                      </div>
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
      email: {
        required: true,
        email: true,
      },
      role: {
        required: true,
  
      },
      UserName: {
        required: true,
  
      },
    },
    messages: {
      UserName: {
        required: "Please enter your name",
        
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      role: {
        required: "Please select a role",
        
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