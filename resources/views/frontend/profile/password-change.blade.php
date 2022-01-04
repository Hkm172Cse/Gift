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
		            <h4 class="card-title">Change Password</h4>
		          </div>
		          <div class="card-body">
		            <div class="row">
		            
		             	<div class="col-md-4 offset-md-4">
          					@if (Session::has('alert'))

                          <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
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
			                  <div class="col-md-12 border-bottom">
			                    <table class="table table-striped">
			                    	<form action="{{route('customer.update.pass')}}" method="Post">
			                    		@csrf
				                    	<tr>
				                            <th class="bg-primary" width="30%">Current Password</th>
				                            <td class="bg-warning"><input type="Password" name="crnt_pass"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">New Password</th>
				                            <td class="bg-warning"><input type="Password" name="new_pass"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Confirm Password</th>
				                            <td class="bg-warning"><input type="Password" name="con_pass"></td>
				                            
	                          			</tr>
	                          			<tr>
	                          				<td><input type="submit" class="btn bg-gradient-success btn-default btn-block btn-sm" value="Update"></td>
	                          			</tr>
                          			</form>

			                    	
			                    </table>
			                   
			                    

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