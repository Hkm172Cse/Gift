@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " > 
            <h1 class="m-0 text-dark">Manage Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                              User List
                            </h3>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddUserForm" >Add User</button>
                            <div class="modal fade" id="AddUserForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  
                                  </div>
                                  <div class="modal-body">
                                  

                                  <form action="{{route('users.store')}}" id="addForm" method="POST">
                                  {{csrf_field()}}
                                    <div class="row">
                                    <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="UserName" placeholder="Enter ...">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter ...">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter ...">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password1" class="form-control" name="password" placeholder="Enter ...">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" id="password2" class="form-control" name="password2" placeholder="Enter ...">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role" class="custom-select" > 
                                      <option selected="" disabled="">Select a role</option>
                                      <option>Admin</option>
                                      <option>User</option>
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
                            @if (Session::has('alert'))

                              <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('alert') }}
                              </div>
                            @endif

                            <table id="example2" class="table table-bordered table-striped">
                              <thead class="primary">
                              <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              <tfoot>
                              <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                              </tr>
                              </tfoot>
                            
                              <tbody>
                              @foreach($allData as $key => $user)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->UserName}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->addr}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                <a title="Edit" class="btn btn-primary  btn-md" href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit"></i></a>
                                  </a>

                                <a title="Delete" id="delete" class="btn btn-danger  btn-md" href="{{route('users.delete',$user->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                              </tr>
                              @endforeach
                              </tbody>
                              
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
      password: {
        required: true,
        minlength: 8
      },
      password2: {
        required: true,
        minlength: 8,
        equalTo: '#password1'
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
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      password2: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long",
        equalTo: "Password Missmatch"
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