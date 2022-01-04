@extends('backend/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " > 
            <h1 class="m-0 text-dark">Manage Product Size</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">size</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- User List -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <section class="col-md-12 ">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-user mr-1"></i>
                              Size
                            </h3>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddUserForm" >Add Size </button>
                            <div class="modal fade" id="AddUserForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Size</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                    </div>
                                    <div class="modal-body">
                                    

                                    <form action="{{route('size.store')}}" id="addForm" method="POST">
                                    {{csrf_field()}}
                                      <div class="row">
                                        <div class="col-sm-12 ">
                                        <!-- text input -->
                                          <div class="form-group">
                                          <label>Size</label>
                                          <input type="text" class="form-control" name="name" value="{{@$editCat->name}}">
                                          

                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-sm-1">
                                      <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                      </div>
                                     </form>
                                     </div>
                                  </div>
                                </div>
                              </div>

                          </div><!-- /.card-header -->
                          
                      </div><!-- /.card-body -->
                      <div class="card" >
                          <div class="card-body" >
                            <font color="red"></font>
                            @if (Session::has('errors'))

                                <div id="success-alert" class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  {{$errors->first('name')}}
                                </div>
                            @endif

                            @if (Session::has('alert'))

                              <div id="success-alert" class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('alert') }}
                              </div>
                            @endif

                            <table id="example2" class="table table-bordered table-striped">
                              <thead class="primary">
                              <tr>
                                <th width="6%">SL.</th>
                                <th>Sizes</th>
                                <th width="12%">Action</th>
                               
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($catData as $key => $size)
                              @php
                                $size_count = App\model\ProductSize::where('size_id',$size->id)->count();
                              @endphp
                              <tr class="{{$size->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$size->name}}</td>
                                <td>
                                <a title="Edit" class="btn btn-primary  btn-md"  href="{{route('size.edit',$size->id)}}"><i class="fas fa-edit"></i></a>
                                  </a>
                                  @if($size_count<1)
                                <a title="Delete" id="delete" class="btn btn-danger  btn-md" href="{{route('size.delete',$size->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                @else <button data-toggle="tooltip" data-placement="top" title="You can't delete this item. This size has product" class="btn btn-danger  btn-md disabled" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                @endif
                                </td>
                              </tr>
                              @endforeach
                              </tbody>
                              <tfoot>
                              <tr>
                                <th width="6%">SL.</th>
                                <th>Sizes</th>
                                <th width="12%">Action</th>                             
                              </tr>
                              </tfoot>
                            </table>
                          </div>

                        </div>
                     <!-- /.card-body -->

                      </section>   
                    </div>
                  </div><!-- /.container-fluid -->
              </section>
          <!-- right col -->
</div><!-- /.row (main row) -->
  <!-- jQuery Form Validation -->
        
<script>
$(function () {
  $.validator.setDefaults({
    
  });
  $('#addForm').validate({
    rules: {

      name: {
        required: true,
  
      },

    },
    messages: {
      name: {
        required: "Please enter a category name",
        
      },
      
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

@endsection