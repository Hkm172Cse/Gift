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
		            <h4 class="card-title">Events </h4>
		          </div>
		          <div class="card-body">
		            <div class="row">
		            	<div style="text-align: center;" class="col-12 col-sm-12 ">
                       @if (Session::has('alert'))

                          <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('alert') }}
                          </div>
                         @endif
                         <font color="red"></font>
                            @if (Session::has('errors'))

                                <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  {{$errors}}
                                </div>
                            @endif
                			<button title="Create Celebration" type="button" class=" center btn btn-primary btn-circle btn-xl" data-toggle="modal" data-target="#AddUserForm" ><i class="fa fa-plus"></i>
                      </button>

                			
                			<div class=" modal fade" id="AddUserForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="exampleModalLabel">Celebration Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                    </div>
                                    <div class="modal-body bg-warning">
                                    <form action="{{route('customer.shipping.store')}}" id="addForm" method="post">
                                    {{csrf_field()}}
                                  
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>Person Name *</label>
                                          		<input type="text" id="name" class="form-control" name="name" value="" required>
                                          		{{$errors->first('name')}}
                                          </div>
                                        </div>
                                         <div class="col-sm-2">
                                          <div class="form-group">
                                            <label>Age *</label>
                                            	<input type="text" id="age" class="form-control" name="age" value="" required>
                                            	{{$errors->first('gender')}}
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Celebration Date</label>
                                              <input type="text" name="shipping_date" class="form-control"  placeholder="dd/mm/yyyy"  inputmode="numeric" required="" id="from">
                                                <script type="text/javascript">
                                                  $(document).ready(function() {
                                                      var d = new Date();
                                                      var monthNames = ["January", "February", "March", "April", "May", "June",
                                                        "July", "August", "September", "October", "November", "December"
                                                      ];
                                                      today = monthNames[d.getMonth()] + ' ' + d.getDate() + ' ' + d.getFullYear();

                                                      $('#from').datepicker({
                                                        defaultDate: "+3d",
                                                        minDate: 2,
                                                        maxDate: "+3M",
                                                        dateFormat: "yy-mm-dd",
                                                        showOtherMonths: true,
                                                        changeMonth: true,
                                                        selectOtherMonths: true,
                                                        required: true,
                                                        showOn: "focus",
                                                        numberOfMonths: 1,
                                                      });



                                                    });
                                                </script>

                                             
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Gender *</label>
                                            	<select name="gender" class="custom-select"  required> 
			                                      <option selected="" disabled="">Select Gender</option>
			                                      <option>Male</option>
			                                      <option>Female</option>
			                                      <option>Other</option>
			                                    </select>
                                          </div>
                                        </div>
                                        
                                     </div>

                                      <div class="row">
                                        <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>Relation(Optional)</label>

                                          		<input type="text" id="relation" class="form-control" name="relation" value="" >
                                          </div>
                                        </div>
                                         <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>Mobile *</label>
                                            	<input type="text" id="mobile" class="form-control" name="mobile" value="" required>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label>E-Mail(If any)</label>
                                            	<input type="text" id="email" class="form-control" name="email" value="" >
                                          </div>
                                        </div>
                                        
                                     </div>

                                     <div class="row">
                                        <div class="col-sm-3">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>City *</label>
                                          		<input type="text" id="city" class="form-control" name="city" value="" required>
                                          </div>
                                        </div>
                                         <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Postal *</label>
                                            	<input type="text" id="postal" class="form-control" name="postal" value="" required>
                                          </div>
                                         
                                        </div>
                                         <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Celebration Time (Optional)</label>
                                             <div class="input-group">
                                            
                                              <input type="time" name="shipping_time" class="form-control" inputmode="numeric">
                                            </div>
                                                            
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Address *</label>
                                            	<textarea id="address" class="form-control" name="address" value="" rows="2" required></textarea> 
                                          </div>
                                        </div>
                                        
                                     </div>
                                      <div class="row">
                                      	<div class="col-sm-12">
                                          <div class="form-group">
                                            <label>Special note(If any)</label>
                                            	<textarea placeholder="Describe how you want to celebrate or surprise your person......" id="note" class="form-control" name="note" value="" rows="2"></textarea> 
                                          </div>
                                        </div>
                                      </div>


                                      <div class="row">
                                          <div class="col-sm-1">
                                            <button type="submit" value="submit" class="btn btn-primary">submit</button>
                                          </div>
                                      </div>
                               	</form>
                                
                                     </div>
                                  </div>
                                </div>
                              </div>     	              
		            	</div>		
		          	</div>	
		          	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               


              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              	@php
                	$s= App\model\Shipping::where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
                @endphp
            
              </div>
               <div class="row">
               	@php
                $shipid=session()->get('ship');
                @endphp
          <!-- ./col -->
          @foreach($s as $t)
          <div class=" col-md-4 col-6">
            <div class="card card-primary bg-warning" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">

              <div class="card-header" style="background: rgba(0,0,0,.1)">
                <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-user"></i></span>  {{$t->name}}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="inner">
                <table class="table table-bordered table-sm">
                        <thead>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <th class="bg-success" width="30%">Name</th>
                            <td class="bg-warning">{{$t->name}}</td>
                          </tr>
                          
                          <tr>
                            <th class="bg-success" width="30%">Mobile</th>
                            <td class="bg-warning">{{$t->mobile}}</td>
                          </tr>
                         
                          <tr>
                            <th class="bg-success" width="30%">Address</th>
                            <td class="bg-warning">{{$t->city}}</td>
                          </tr>
                          <tr>
                            <th class="bg-success" width="30%">Postal</th>
                            <td class="bg-warning">{{$t->postal}}</td>
                          </tr>
                          <tr>
                            <th class="bg-success" width="30%">Address</th>
                            <td class="bg-warning">{{$t->address}}</td>
                          </tr>
                          <tr>
                            <th class="bg-success" width="30%">Action</th>
                            <td class="bg-warning">
                              <div class="small-box-footer">
                                <form action="{{route('customer.cart.add')}}" method="get">
                                <input class="form-group" type="hidden" name="shipid" value="{{$t->id}}">
                                @if($shipid=true)
                                <button target="_blank" data-toggle="tooltip" data-placement="top" title="Add Gift Item"  type="submit" value="submit" class="float-left bg-danger btn-circle"><i class="fas fa-cart-arrow-down"></i></button>@endif
                                </form>

                                <a target="_blank" href="{{route('customer.shipping.details',$t->id)}}" data-toggle="tooltip" data-placement="top"  title="Details & Cart" type="submit" value="submit" class="float-left bg-danger btn-circle"><i class="fas fa-info"></i></a>

                                
                                <a target="_blank" href="{{route('customer.shipping.edit',$t->id)}}" data-toggle="tooltip" data-placement="top"  title="Edit" type="submit" value="submit" class="float-left bg-danger btn-circle" class=" btn-circle "><i class="fas fa-user-edit"></i></a>

                                <a target="_blank" id="delete" href="{{route('customer.shipping.delete',$t->id)}}" data-toggle="tooltip" data-placement="top"  title="Delete" type="submit" value="submit" class="float-left bg-danger btn-circle" class=" btn-circle "><i class="fas fa-trash"></i></a>

                              </div>
                             </td>
                          </tr>   
                        </tbody>
                      </table>
                
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
           @endforeach
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>	           
		          </div>
		        </div>		        
		      </div>
		     
		    </div>
		  </div><!-- /.container-fluid -->
		</section>
		<script>
			$(function () {
			  $.validator.setDefaults({
			    
			  });
			  $('#addForm').validate({
			    rules: {

			      

			    },
			    messages: {
			      
			      
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
              
</div><!-- /.row (main row) -->
  
@endsection