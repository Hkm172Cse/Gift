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
                <h4 class="card-title">Category Wise Product</h4>
              </div>
              <div class="card-body">
                <div>
                  
                  @foreach($statuses as $status)
                    
                    <a class=" btn btn-info" href="{{route('three.status.menu',$status->status)}}" data-filter="1"> {{$status->status}} </a>
                  
                  @endforeach
                  <div class="mb-2">
                    <div class="float-right">
                      
                      <div class="btn-group"  data-sortOrder>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    @foreach($orders as $order)
                    <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
                       
                      
                       <h1 style="text-align: center" class="mt-3">{{$order->shipping_id}}</h1>
                       
                    </div>
                    @endforeach
                    
                  </div>
                </div>

              </div>
             
            </div>
            
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
              
</div><!-- /.row (main row) -->
  <!-- jQuery Form Validation -->
        


@endsection