@extends('backend/master')
@section('content')


	<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-list"></i></span>Upcoming Celebrations </h3>
    
    <h4 class="float-right">Total: {{count($orders)}}</h4>
  </div>
  <div class="card-body">
  	<div class="row">
	  	<div class="col-md-12 ">
		  	<form action="{{route('upcoming.orders.view.filter')}}" method="get" class="" style="width: 310px; margin-bottom: 18px; ">
		    	@csrf
		        	
		    <div class="input-group">
		    	<label style="margin-right: 10px;">
		     			Filter By Status
		    		</label>
		        <select name="status" id="status" class="custom-select form-control" style="margin-right: 10px;">
		        	<option {{($status=='All')?"selected":""}}><span  class="badge bg-warning">All</span></option> 
		          	<option {{($status=='Pending')?"selected":""}}><span  class="badge bg-warning">Pending</span></option>
                    <option {{($status=='Approved')?"selected":""}}><span class="badge bg-success">Approved</span></option>
              		<option {{($status=='Processing')?"selected":""}}><span class="badge bg-primary">Processing</span></option>
              		<option {{($status=='Delivered')?"selected":""}}><span class="badge bg-success">Delivered</span></option>
                  <option {{($status=='Rejected')?"selected":""}}><span class="badge bg-danger">Rejected</span></option>
		        </select>
		        <span class="input-group-btn">
		        <button type="submit" class="btn btn-sm bg-primary  ">Update</button>
		    </span>
			</div>                
			</form>
		</div>
	</div>
  	<table id="example2" class="table table-bordered table-striped"  style="text-align: center;">
      <thead>
        <th width="10%" class="bg-success">Order Number</th>
        <th class="bg-success">Customer Name</th>
        <th class="bg-success">Amount</th>
        <th class="bg-success">Payment Method</th>
        <th class="bg-success">Transaction Id</th>
        <th class="bg-success">Creation Date</th>
        <th class="bg-success">Celebration Date</th>
        <th class="bg-success">Status</th>
        <th class="bg-success">Details</th>

      </thead>
      <tbody>
      	@if(!empty($orders))
      	@foreach($orders as $order)
      	@php
      		$users = App\User::where('id',$order->user_id)->first();
      	@endphp
        <tr>
            <td>{{'#' . $order->order_no}}</td>
            <td>{{$users->UserName}}</td>
            <td>{{$order->order_total}}</td>
            <td>{{$order['payment']['payment_method']}}</td>
            <td>{{$order['payment']['trx_num']}}</td>
            <td>{{$order->updated_at}}</td>
            <td>{{$order->shipping_date}}</td>

            <td width="15%">
            
		            <form action="{{route('update.order.status',$order->id)}}" method="POST">
		            	@csrf
  		            	<label>
                      @if($order->status =='Pending')<span class="badge bg-warning">Pending</span>@endif
  		                @if($order->status =='Approved')<span class="badge bg-success">Approved</span>@endif
                      @if($order->status =='Processing')<span class="badge bg-primary">Processing</span>@endif
                      @if($order->status =='Delivered')<span class="badge bg-success">Delivered</span>@endif
  		                @if($order->status =='Rejected')<span class="badge bg-danger">Rejected</span>@endif
                    </label>
		                <select name="status" id="status" class="custom-select" > 
		                  <option {{($order->status =='Pending')?"selected":""}}><span  class="badge bg-warning">Pending</span></option>
		                  <option {{($order->status =='Approved')?"selected":""}}><span class="badge bg-success">Approved</span></option>
                      		<option {{($order->status =='processing')?"selected":""}}><span class="badge bg-primary">Processing</span></option>
                      		<option {{($order->status =='Delivered')?"selected":""}}><span class="badge bg-success">Delivered</span></option>
		                  <option {{($order->status =='Rejected')?"selected":""}}><span class="badge bg-danger">Rejected</span></option>
		                </select>
		                <button type="submit" class="btn btn-sm bg-primary mt-2">Update</button>
		                
		            </form>
            	

            </td>
             <td>
                    <form action="{{route('customer.invoice.print',$order->id)}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$order->shipping_id}}" name="shipping_id">

                    <button  type="submit" class="btn btn-xs btn-default bg-success" >Details</button>
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
</div>	
</div>
</section>
</div>
@endsection