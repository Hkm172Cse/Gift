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
                <h4 class="card-title">View Shipping Details</h4>
                
              </div>
              <div class="card-body">
              	
        <div class="card card-primary card-outline">
          <div class="card-header">
          
          </div>
          <div class="card-body">
           
            <div class="row">
              <div class="col-4 col-sm-2">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                	<!--============first_tab_link==================-->
                  <a  class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Shipping Details</a>
                  <!--============second_tab_link==================-->
                  <a class="nav-link" id="vert-tabs-cart-tab" data-toggle="pill" href="#vert-tabs-cart" role="tab" aria-controls="vert-tabs-cart" aria-selected="false">Cart</a>
                  <!--============third_tab_link==================-->
                  <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Order History</a>
                  
                </div>
              </div>

              <div class="col-8 col-sm-10">
                <div class="tab-content" id="vert-tabs-tabContent">
                	<!--============first_tab==================-->
                  <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                     
	 					<div class="card card-primary">
			              <div class="card-header">
			                <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-user"></i></span>  {{$shipping->name}}</h3>
			              </div>
			              <div class="card-body">
			              	<table class="table table-bordered">
			                  <thead>
			                    
			                  </thead>
			                  <tbody>
			                    <tr>
				                    <th class="bg-success" width="30%">Name</th>
				                    <td class="bg-warning">{{$shipping->name}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Gender</th>
				                    <td class="bg-warning">{{$shipping->gender}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Age</th>
				                    <td class="bg-warning">{{$shipping->age}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Relation</th>
				                    <td class="bg-warning">
				                    	@if(!empty($shipping->relation))
				                    		{{$shipping->relation}}
				                    	@else {{"No Data Available !"}}
				                    	@endif
				                    </td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Mobile</th>
				                    <td class="bg-warning">{{$shipping->mobile}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Email</th>
				                    <td class="bg-warning">
				                    	@if(!empty($shipping->email))
				                    	{{$shipping->email}}
				                    	@else {{"No Data Available !"}}
				                    	@endif
				                    </td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">City</th>
				                    <td class="bg-warning">{{$shipping->city}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Postal</th>
				                    <td class="bg-warning">{{$shipping->postal}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Address</th>
				                    <td class="bg-warning">{{$shipping->address}}</td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Special Note</th>
				                    <td class="bg-warning">
				                    	@if(!empty($shipping->note))
				                    	{{$shipping->note}}
				                    	@else {{"No Data Available !"}}
				                    	@endif
				                    </td>
			                    </tr>
			                    <tr>
				                    <th class="bg-success" width="30%">Creation Time</th>
				                    <td class="bg-warning">
				                    	{{$shipping->created_at}}
				                    </td>
			                    </tr>
			                    

			                    
			                  </tbody>
			                </table>
			                <div class="row">
			                	<div class="col-md-4">
			                		<a href="{{route('customer.shipping.edit',$shipping->id)}}" data-toggle="tooltip" data-placement="top"  title="edit" type="submit" value="submit" class="mt-3 float-left bg-primary btn btn-lg"><i class="fas fa-user-edit"></i>Edit</a>
			                	</div>
			                </div>
			              </div>
		                </div>
	                
           	  	   
                  </div>

                 <!--============second_tab==================-->

                  <div class="tab-pane fade" id="vert-tabs-cart" role="tabpanel" aria-labelledby="vert-tabs-cart-tab">
                     <div class="card card-primary">
		              <div class="card-header">
		                <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-cart"></i></span>Cart for   {{$shipping->name}}</h3>
		              </div>
		              <div class="card-body">

		              	
		              	@php
			  			$carts= App\model\Cart::where('shipping_id',$shipping->id)->orderBy('id', 'desc')->first();
						@endphp


							@if(!empty($carts))							
							<div class="col-12 table-responsive">
								
							  <table class="table table-striped" style="text-align: center;">
								<thead>
								<tr>
								  <th>SL.</th>	
								  <th>Product</th>
								  <th>Image</th>
								  <th>Size</th>
								  <th>Color</th>
								  <th>Quantity</th>
								  <th>Price</th>
								  <th>Total</th>
								  <th>Remove</th>
								</tr>
								</thead>
							   
								<tbody>
									
									@foreach($cart as $key => $cart_item)
									
								<tr>
								  <td>{{$key+1}}</td>
								  <td>@if($cart_item->product_name){{$cart_item->product_name}}@else {{'The product is removed'}} @endif</td>
								  
								  <td>
									<img class="profile-user-img img-fluid img-square" src="{{(!empty($cart_item->product_image))?url('backend/upload/product_img/'.$cart_item->product_image):url('backend/upload/null.png')}}" style="width:50px; height: 50px;">
									
								  </td>
								  <td>
									@php
										$size= App\model\ProductSize::where('id',$cart_item->size_id)->first();
										$sizename= App\model\Size::where('id',$size->size_id)->first();
									@endphp
									{{$sizename->name}}

								  </td>
								  <td>
									@php
										$color= App\model\ProductColor::where('id',$cart_item->color_id)->first();
										$colorname= App\model\Color::where('id',$color->color_id)->first();
									@endphp
									{{$colorname->name}}
								  </td>
								  <td style="text-align: center;">{{$cart_item->quantity}}</td>
								  <td>{{$cart_item->price}}</td>
								  <td>{{$cart_item->price * $cart_item->quantity}}</td>
								  <td><a title="Delete" id="delete" class="btn btn-danger  btn-md" href="{{route('customer.cart.deleteitem',$cart_item->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
								</tr>
								@endforeach
								<tr style="border-bottom : 1px solid #dee2e6;">
									<td  colspan="2">
										<a style="margin-left: 11px" title="Delete" id="delete" class="btn btn-danger  btn-md" href="{{route('customer.cart.alldelete',$shipping->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Empty Cart </a>
									</td>
									<td colspan="10">
										
									</td>
									

								</tr>
								
							  
								</tbody>
							  </table>
							 
							</div>
							
						
						<!-- /.col -->



							 <div class="col-md-6 float-right ">								 		
								  <p style="text-align: center;"class="lead">Due Date: {{$carts->created_at}}</p>
								  <div class="table-responsive">
									<table class="table">
									  <tbody>
										<tr>
										<td colspan="9"><b>Subtotal:</b></td>
										
										<td colspan="3" ><b>
											@foreach($cart as $cartitem)
											@php
											$subtotal = ($cart_item->price * $cart_item->quantity);
											$subtotal += $subtotal;
											@endphp
											@endforeach
											{{$subtotal}}
											
											</b>
										</td>	
									  </tr>
									  <tr>
										<td colspan="9"><div><b>Select Payment Method</b></div></td>
										
										<td colspan="3" >
											
											
											

											<form action="{{route('customer.payment.store')}}" method="POST" id="">
												@csrf
												
												<input type="hidden" name="shipping_id" value="{{$shipping->id}}">
												<input type="hidden" name="order_total" value="{{$subtotal}}">
												@if (Session::has('errors'))

											<div id="success-alert" class="alert alert-danger alert-dismissible fade show">
											  <button type="button" class="close" data-dismiss="alert">&times;</button>
											  {{$errors->first('payment_method')}}
											  {{$errors->first('trx_num')}}
											</div>
											@endif
												<label for="chkYes">
												  <input type="radio" id="chkYes" name="payment_method" value="bKash" /> bKash									  
												</label>
												<label for="chkNo">
												  <input type="radio" id="chkNo" name="payment_method" value="rocket" /> Rocket
												</label>
												<div class="" id="dvPinNo" style="display: none">
													<div id="bkash">bKash Payment: 01928263785</div>
													<div id="rocket">Rocket Payment: 01617915000</div>
												  
												  <input name="trx_num" placeholder="Transaction Number...." type="text" id="txtPinNo" />

												</div>  
												<div id="submit1" style="display: none;" class="mt-3">
													<button  type="submit" class="btn btn-success "><i class="far fa-credit-card"></i> Submit Payment </button>
												</div>
												<div id="submit2" style="display: none;" class="mt-3">
													<button  type="submit" class="btn btn-success "><i class="far fa-credit-card"></i> Submit Payment </button>
												</div>
											</form>
											
										</td>	
									  </tr>
									</tbody>
								</table>
							   </div>	
							
							
						</div>
						@else{{'your cart is empty'}}
						@endif
						
							
	                </div>
           	  	</div>
                  </div>

                  <!--============third_tab==================-->

                  <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
             		<div class="card card-primary">
		              <div class="card-header">
		                <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-list"></i></span>Order List</h3>
		              </div>
		              <div class="card-body">
		              	<table class="table table-bordered" style="text-align: center;">
		                  <thead>
		                    <th width="10%" class="bg-success">Order Number</th>
		                    <th class="bg-success">Order Total</th>
		                    <th class="bg-success">Payment Method</th>
		                    <th class="bg-success">Transaction Id</th>
		                    <th class="bg-success">Order Date</th>
		                    <th class="bg-success">Status</th>
		                    <th class="bg-success">Details</th>

		                  </thead>
		                  <tbody>
		                  	@if(!empty($orders))
		                  	@foreach($orders as $order)
		                    <tr>
			                    <td>{{'#' . $order->order_no}}</td>
			                    <td>{{$order->order_total}}</td>
			                    <td>{{$order['payment']['payment_method']}}</td>
			                    <td>{{$order['payment']['trx_num']}}</td>
			                    <td>{{$order->updated_at}}</td>
			                    <td>@if($order->status =='Pending')<span class="badge bg-warning">Pending</span>@endif
			                    	@if($order->status =='Approved')<span class="badge bg-success">Approved</span>@endif
			                    	@if($order->status =='Rejected')<span class="badge btn-danger">Rejected</span>@endif
			                    </td>
			                    <td>
								  	<form action="{{route('customer.invoice.print',$order->id)}}" method="POST">
							    	@csrf
							    	<input type="hidden" value="{{$shipping->id}}" name="shipping_id">

							    	<button  type="submit" class="btn btn-xs btn-default bg-success" >Details & Invoice</button>
							    </form>
								</td>


		                    </tr>
		                    @endforeach
		                  </tbody>
		                  @else
		                  {{"You Haven't Orderd Anything!!!"}}
		                  @endif
		                </table>

		              </div>
                </div>
                  </div>
                   <!--order detail modal content-->

                  
            
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
</div><!-- /.row (main row) -->
  <!-- jQuery Form Validation -->
      <script type="text/javascript">
      	  $(function() {
			   $("input[name='payment_method'] ").click(function() {
			     if ($("#chkYes").is(":checked")) {
			       $("#dvPinNo").show();
			       $("#bkash").show();
			       $("#submit1").show();
			       $("#rocket").hide();
			       $("#submit2").hide();
			     } else {
			       ($("#chkNo").is(":checked"))
			       $("#bkash").hide();
			       $("#dvPinNo").show();
			       $("#rocket").show();
			       $("#submit1").hide();
			       $("#submit2").show();
			       
			     }
			   });
			 });

      </script>  

      <!--order detail modal script-->

		<script>
		$(document).ready(function() {
		$(".open-details-modal").click(function() {
		$("#shippingID").html($(this).data("product-shippingID"));
		$("#orderID").html($(this).data("orderID"));

		$("#detailsModal").modal("show");

		});
		});
		</script>

		<script type="text/javascript">
			
		document.getElementById("btnPrint").onclick = function () {
		printElement(document.getElementById("printThis"));
		}

		function printElement(elem) {
		    var domClone = elem.cloneNode(true);
		    
		    var $printSection = document.getElementById("printSection");
		    
		    if (!$printSection) {
		        var $printSection = document.createElement("div");
		        $printSection.id = "printSection";
		        document.body.appendChild($printSection);
		    }
		    
		    $printSection.innerHTML = "";
		    $printSection.appendChild(domClone);
		    window.print();
		}
		</script>
		<script type="text/javascript">
			$("#prospects_form").submit(function(e) {
			    e.preventDefault();
			});
		</script>


@endsection