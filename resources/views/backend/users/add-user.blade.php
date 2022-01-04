@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Users</h1>
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
                            <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                          <form action="{{route('users.store')}}" method="POST">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="UserName" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter ...">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-4">
                                  <!-- textarea -->
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role" class="custom-select" >
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
                              </div>
                            </div>
                         </form>

                          </div><!-- /.card-body -->
                      </section>   
                    </div>
                  </div><!-- /.container-fluid -->
              </section>
          <!-- right col -->
</div><!-- /.row (main row) -->
        
  @endsection