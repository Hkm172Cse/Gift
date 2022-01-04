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
		            <h4 class="card-title">My Profile</h4>
		          </div>
		          <div class="card-body">
		            <div class="row">
		            
		             	<div class="col-md-4 offset-md-4">
          				 @if (Session::has('alert'))

                          <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('alert') }}
                          </div>
                         @endif
			            <div class="card card-widget widget-user shadow">
			              <!-- Add the bg color to the header using any of the bg-* classes -->
			              <div class="widget-user-header bg-info">
			                <h3 class="widget-user-username">{{$profile->UserName}}</h3>
			                <h5 class="widget-user-desc">Joined at: {{$profile->created_at}}</h5>
			              </div>
			              <div class="widget-user-image">
			                <img class="product-image img-fluid img-square" src="{{(!empty($profile->image))?url('backend/upload/user/'.$profile->image):url('backend/upload/null.png')}}">
			              </div>

			              <div class="card-footer ">
			              	<div class="row ">
			                    	<a href="{{route('customer.change.pass')}}" class="btn bg-gradient-danger btn-default btn-block btn-sm"><i class="fas fa-key"></i> Change Password</a>
			                </div>

			                <div class="row mt-3">
			                  <div class="col-md-12 border-bottom">
			                    <table class="table table-striped">
			                    	<tr>
			                            <th class="bg-primary" width="30%">Email</th>
			                            <td class="bg-warning">{{$profile->email}}</td>
                          			</tr>
                          			<tr>
			                            <th class="bg-primary" width="30%">Mobile</th>
			                            <td class="bg-warning">{{$profile->phone}}</td>
                          			</tr>
                          			<tr>
			                            <th class="bg-primary" width="30%">City</th>
			                            <td class="bg-warning">{{$profile->city}}</td>
                          			</tr>
                          			<tr>
			                            <th class="bg-primary" width="30%">Postal</th>
			                            <td class="bg-warning">{{$profile->postal}}</td>
                          			</tr>
                          			<tr>
			                            <th class="bg-primary" width="30%">Address</th>
			                            <td class="bg-warning">{{$profile->addr}}</td>
                          			</tr>
                          			<tr>
			                            <th class="bg-primary" width="30%">Gender</th>
			                            <td class="bg-warning">@if($profile->gender==NULL){{'No Data Available'}}@else{{$profile->gender}}@endif</td>
                          			</tr>

			                    	
			                    </table>
			                    <div class="row ">
			                    	<a href="{{route('customer.edit.profile',$profile->id)}}" class="btn bg-gradient-success btn-default btn-block btn-sm"><i class="fas fa-user-edit"></i>  Edit Profile</a>
			                    </div>
			                    

			                    <!-- /.description-block -->
			                  </div>
			                 
			                  <!-- /.col -->
			                </div>
			                <!-- /.row -->
			              </div>
			            </div>
			            <!-- /.widget-user -->
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