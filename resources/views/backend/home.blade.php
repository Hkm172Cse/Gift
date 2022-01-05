@extends('backend/master')
@section('content')
@if(Auth::user()->role=='Admin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{('/mypayment')}}">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @else
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><span style="margin-right: 3px"><i class="nav-icon fas fa-list"></i></span>Your Celebration List</h3>
  </div>
  <div class="card-body">
    @php
    $user_id=Auth::user()->id;
    $orders= App\model\Order::where('user_id',$user_id)->get();
    @endphp
    <table class="table table-bordered" style="text-align: center;">
      <thead>
        <th width="10%" class="bg-success">Celebration Number</th>
        <th class="bg-success">Name</th>
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
          $users = App\model\Shipping::where('id',$order->shipping_id)->first();
        @endphp

        <tr>
            <td>{{'#G20' . $order->order_no}}</td>
            <td>{{$users->name}}</td>
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
@endif
@endsection