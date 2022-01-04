@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " > 
            <h1 class="m-0 text-dark">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
                              Edit User
                            </h3>
                          </div><!-- /.card-header -->
                          
                      </div><!-- /.card-body -->
                      <div class="card" >
                          <div class="card-body" >

                                <form action="{{route('users.update',$editUser->id)}}" id="addForm" method="post">
                                    {{csrf_field()}}
                                  
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>User Name</label>
                                          <input type="text" id="UserName" class="form-control" name="UserName" value="{{$editUser->UserName}}" >
                                          </div>
                                        </div>
                                         <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>Select Role</label>
                                            <select name="role" id="role" class="custom-select" > 
                                              <option selected="" disabled="">Select a role</option>
                                              <option {{($editUser->role=="Admin")?"selected":""}}>Admin</option>
                                              <option {{($editUser->role=="User")?"selected":""}}>User</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" id="email" class="form-control" name="email" value="{{$editUser->email}}">
                                          </div>
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