<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gift | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/custom.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/toastr/toastr.min.css">
  <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    @if(Auth::user()->role=='User')
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      @php
        $session_shipping_id = session()->get('ship');
        $carts= App\model\Cart::where('shipping_id',$session_shipping_id)->orderBy('id', 'desc')->get();
        $shipping_name = App\model\Shipping::where('id',session()->get('ship'))->orderBy('id', 'desc')->first();
      @endphp
      @if(!empty($shipping_name))
      <li class=" d-inline p-2 text-white"><p class="badge bg-warning"><i class="fas fa-bell text-red"></i> You Are Buying Products for {{$shipping_name->name}}</br>
        However, You Can Change The Receiver From Here <i class="fas fa-arrow-right"></i></p> </li>
      <li>@endif
        @php
          $s= App\model\Shipping::where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
        @endphp
        <form action="{{route('customer.cart.receiver')}}" method="POST">
          @csrf
        <select name="shipping_id" class="custom-select bg-warning" >
          <option  selected disabled="">Change Receiver</option>
          @foreach($s as $shipping)
          <option class="border-bottom" value="{{$shipping->id}}">{{$shipping->name}}</option>
          @endforeach             
          </select>
          <button type="submit" class="btn bg-gradient-success btn-default btn-block btn-sm">Set</button>
          </form> 
      </li>
      <li class="nav-item dropdown border border-warning d-inline p-2 bg-primary text-white">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span ><button class="bg-danger">Cart</button></span>
        </a>
        <div class="row">
        <div style="min-width: 500px" class=" col-md-6 dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>

          <div class=" table-responsive">
                
                <table class="table table-striped table-sm" style="text-align: center;">
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
                  
                  @foreach($carts as $key => $cart_item)
                  
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cart_item->product_name}}</td>
                    
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
                  
                  @if(session()->has('ship'))
                <tr>
                  <td colspan="12"><a href="{{route('customer.shipping.details',$session_shipping_id)}}"type="submit" target="_blank"  class="border border-warning d-inline p-2 bg-primary text-white">Make Payment or See Full Cart Items</a>
                  </td>
                </tr>
                @endif
                </tbody>

                </table>
               
              </div>
          

        </div>
      </div>
      </li>
    </ul>
    @endif
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary  elevation-4">

    <!-- Sidebar -->
    @include('backend.sidebar')
    <!-- /.sidebar -->
  </aside>
  @yield('content')
  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 Giftshop.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend')}}/dist/js/pages/dashboard.js"></script>
<script src="{{asset('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{asset('backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="{{asset('backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('backend')}}/plugins/filterizr/jquery.filterizr.min.js"></script>
<!----Toaster-->
<script src="{{asset('backend')}}/plugins/toastr/toastr.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script type="text/javascript">
  //delete sweet alert
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link;
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
    });
  });
</script>

<script type="text/javascript">
  //Data table
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false,
      "searching": true,
      "paging": true,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
  //Success Alert
 $("#success-alert").fadeTo(3000, 1000).slideUp(1000, function(){
    $("#success-alert").slideUp(1000);
});
</script>

<script type="text/javascript">
  //Toaster Auto Hide
  $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 2000,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
</script>

<script type="text/javascript">
  //Initialize Select2 Elements
  $(function(){
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

        

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

  });
    
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>

<script type="text/javascript">
  //live image upload
  $(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#liveImg').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
<script>

  //product showcase
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<script type="text/javascript">
  //cart quantity
  $(document).ready(function() {
  const minus = $('.quantity__minus');
  const plus = $('.quantity__plus');
  const input = $('.quantity__input');
  minus.click(function(e) {
    e.preventDefault();
    var value = input.val();
    if (value > 1) {
      value--;
    }
    input.val(value);
  });
  
  plus.click(function(e) {
    e.preventDefault();
    var value = input.val();
    value++;
    input.val(value);
  })
});
</script>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
</html>
