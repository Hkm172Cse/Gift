<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
<link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <div id="print">
  <div id="printableArea">
  <section class="invoice">
   


  
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Gift Shop
          <small class="float-right"></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
	        <strong>{{Auth::user()->UserName }}</strong><br>
	        Address: {{Auth::user()->addr}}<br>
	        City: {{Auth::user()->city}}<br>
	       Mobile: {{Auth::user()->phone}}<br>
	        E-mail: {{Auth::user()->email}}
	    </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
            <strong>{{$shipping->name}}</strong><br>
           	{{$shipping->address}}<br>
            {{$shipping->city}}<br>
            {{$shipping->postal}}<br>
            {{$shipping->mobile}}<br>
            {{$shipping->email}}
        </address>
      </div>
      <!-- /.col -->
      
      <div class="col-sm-4 invoice-col">
      	
        <b>Invoice ID:@if($order->status=='Approved')#00{{$order->order_no}}@else <span class="badge bg-danger">Your Order is  {{$order->status}}. After Approval Your Invoice ID will given.</span> @endif</b><br>
        
        <b>Order Number: </b> #G20{{$order->order_no}}<br>
        <b>Payment Date: </b>{{$order['payment']['created_at']}}<br>
        <b>Celebration Date: </b>{{$shipping->shipping_date}}<br>
        <b>Payment Method: </b>{{$order['payment']['payment_method']}}<br>
        <b>Transection ID: </b>{{$order['payment']['trx_num']}}<br>
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
         <table class="table table-striped" style="text-align: center;">
		  <thead>
			<th class="bg-success">SL.</th>
			<th class="bg-success">Product Name</th>
			<th class="bg-success">Image</th>
			<th class="bg-success">Size</th>
			<th class="bg-success">Color</th>
			<th class="bg-success">Quantity</th>
			<th class="bg-success">Price</th>
			<th class="bg-success">Total</th>

		  </thead>
			  <tbody>
				@foreach($orderDetails as $key => $orderItem)
				<tr>
				  <td>{{$key+1}}</td>
				  <td>@if($orderItem->product_name){{$orderItem->product_name}}@else{{'The product is removed'}}@endif</td>
				  
				  <td>
					<img class="profile-user-img img-fluid img-square" src="{{(!empty($orderItem->product_image))?url('backend/upload/product_img/'.$orderItem->product_image):url('backend/upload/null.png')}}" style="width:50px; height: 50px;">
					
				  </td>
				  <td>
					@php
						$size= App\model\ProductSize::where('id',$orderItem->size_id)->first();
						$sizename= App\model\Size::where('id',$size->size_id)->first();
					@endphp
					{{$sizename->name}}

				  </td>
				  <td>
					@php
						$color= App\model\ProductColor::where('id',$orderItem->size_id)->first();
						$colorname= App\model\Color::where('id',$size->size_id)->first();
					@endphp
					{{$colorname->name}}
				  </td>
				  <td style="text-align: center;">{{$orderItem->quantity}}</td>
				  <td>{{$orderItem->price}}</td>
				  <td>{{$orderItem->price * $orderItem->quantity}}</td>
				  
				</tr>
				@endforeach
			  </tbody>
		</table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-8">
        
      </div>
      <!-- /.col -->
      <div class="col-4 float-right">
        
        <div class="table-responsive">
          <table class="table table-striped">
              <th colspan="10">Grand Total:</th>
              <td style="text-align: center;" colspan="2">@foreach($orderDetails as $orderItem)
      				@php 
      				$total=($orderItem->price * $orderItem->quantity);
      				 $subtotal=$total +$total;
      				@endphp
      				
      				@endforeach
      				{{$subtotal}}

			       	</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
 </div>
  </div> 
</div>
  
  <div class="row float-right mt-4"><div class="col-md-2"><input  class="btn btn-md float-right bg-primary" type="button" onclick="printDiv('printableArea')" value="Print+Save PDF" /></div></div>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
 function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>   
<script type="text/javascript">
var doc = new jsPDF(); 
var specialElementHandlers = { 
    '#editor': function (element, renderer) { 
        return true; 
    } 
};
$('#submit').click(function () { 
    doc.fromHTML($('#print').html(), 0, 0, { 
        'width': 100, 
            'elementHandlers': specialElementHandlers 
    }); 
    doc.save('sample-page.pdf'); 
});
</script>

</body>
</html>
