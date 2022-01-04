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
		            <h4 class="card-title">Edit Shipping</h4>
		          </div>
		          <div class="card-body">
		            <div class="row">
		            
		             	<div class="col-md-6 offset-md-3">
          					@if (Session::has('alert'))

                          <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('alert') }}
                          </div>
                         @endif
			            <div class="card card-widget widget-user shadow">
			              <!-- Add the bg color to the header using any of the bg-* classes -->
			                <div class="row ">
			                  <div class="col-md-12 border-bottom">
			                    <table class="table table-striped">
			                    	<form action="{{route('customer.shipping.update',$editShipping->id)}}" method="POST">
			                    		@csrf
				                    	<tr>
				                            <th class="bg-primary" width="30%">Shipping Name</th>
				                            <td class="bg-warning"><input value="{{$editShipping->name}}" type="text" name="name"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Age</th>
				                            <td class="bg-warning"><input value="{{$editShipping->age}}" type="text" name="age"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Gender</th>
				                            <td class="bg-warning"><select name="gender" id="gender" class="custom-select" > 
                                              <option selected="" disabled="">Select a Gender</option>
                                              <option {{($editShipping->gender=="Male")?"selected":""}}>Male</option>
                                              <option {{($editShipping->gender=="Female")?"selected":""}}>Female</option>
                                            </select></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Relation</th>
				                            <td class="bg-warning "><input value="{{$editShipping->relation}}" type="text" name="relation"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Mobile</th>
				                            <td class="bg-warning"><input value="{{$editShipping->mobile}}" type="text" name="mobile"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Email</th>
				                            <td class="bg-warning"><input value="{{$editShipping->email}}" type="text" name="email"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">City</th>
				                            <td class="bg-warning"><input value="{{$editShipping->city}}" type="text" name="city"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Postal</th>
				                            <td class="bg-warning"><input value="{{$editShipping->postal}}" type="text" name="postal"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Address</th>
				                            <td class="bg-warning"><input value="{{$editShipping->address}}" type="text" name="address"></td>
				                            
	                          			</tr>
	                          			<tr>
				                            <th class="bg-primary" width="30%">Special Note</th>
				                            <td class="bg-warning"><textarea name="note">{{$editShipping->note}} </textarea> </td>
				                            
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