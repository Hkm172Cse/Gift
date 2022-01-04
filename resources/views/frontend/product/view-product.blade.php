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
                <h4 class="card-title">View Products</h4>
                
              </div>
              <div class="card-body">
                  @if (Session::has('alert'))

                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" >
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      {{ Session::get('alert') }}
                    </div>
                   @endif
                <div>
                  <a class="btn btn-info active" href="{{route('customer.products.view')}}" data-filter="all"> All items </a>
                  @foreach($categories as $category)
                    
                    <a class=" btn btn-info" href="{{route('category.menu',$category->category_id)}}" data-filter="1"> {{$category['category']['name']}} </a>
                  
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

                    @foreach($catData as $key => $product)
                    <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
                      <a href="{{route('customer.products.details',$product->id)}}"><img  class="product-image img-fluid img-square" src="{{(!empty($product->image))?url('backend/upload/product_img/'.$product->image):url('backend/upload/null.png')}}"></a>
                      
                       <h5 style="text-align: center" class="mt-3">{{$product->name}}</h5>
                       <h6 style="text-align: center" class="mt-3">  <span>&#2547;</span>{{'  '.$product->price}}</h6>

                    </div>
                    @endforeach
                    
                  </div>
                </div>

              </div>
              {{$catData->links()}}
            </div>
            
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
              
</div><!-- /.row (main row) -->
  <!-- jQuery Form Validation -->
        


@endsection