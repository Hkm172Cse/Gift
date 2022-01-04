<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Gift</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
</head>
<body>
<!-- banner -->
<div class="banner_top">
<div class="row">	
	<div class="col-md-12">
	<div data-vide-bg ="{{asset('frontend/video/videoplayback.mp4')}}">
		<div class="w3_agile_header" style="background: rgba(0, 0, 0, 0.44);">
			<div class="w3_agileits_logo">
					<h1><a href="{{ route('/') }}">Gift<span>Life is a gift</span></a></h1>
				</div>
				<div class="w3_menu">
				<div class="agileits_w3layouts_banner_info">
	
					<form action="#" class="src_bx" method="post"> 
						<input type="search" name="search" placeholder=" " required="">
						<input type="submit" value="Search">
						<i class="fas fa-search"></i>
					</form>
				</div>
					<!-- -->
			</div>

		<div class="clearfix"></div>
    </div>
	@yield('banner')
	     <div class="top-nav">
			<nav class="navbar navbar-default">
				<div class="container inner-container">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="home-icon"><a href="{{ route('/') }}"><span class="fa fa-home" aria-hidden="true"></span></a></li>
						<li><a href="{{ route('about') }}">About</a></li>
						<li><a href="{{ route('contact') }}">Contact</a></li>
					</ul>	
					<div class="clearfix"> </div>
				</div>	
			</nav>	
		</div>
     </div>
</div>
	</div>
</div>
     @yield('body')
	<div class="footer_bottom section">
		<div class="agileits-w3layouts-footer">
			<div class="container">
				<div class="col-md-4 w3-agile-grid">
					<h5>About Us</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum urna non nisi ornare, condimentum iaculis ipsum blandit. Duis auctor vulputate metus nec luctus.</p>
					   <div class="w3_agileits_social_media team_agile_w3l team footer">
								<ul class="social-icons3">
									
									<li><a href="#" class="wthree_facebook"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#" class="wthree_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#" class="wthree_dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#" class="wthree_behance"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								</ul>
							</div>	
				<div class="image-agileits">
				<img src="{{asset('frontend/images/f1.jpg')}}" alt="" class="img-r">
				</div>
				<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3-agile-grid mid-w3-add">
					<h5>Address</h5>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+1 234 567 8901</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Broome St, NY 10002, Canada. 
								<span>Telephone : +00 111 222 3333</span>
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-4 footer-right w3-agile-grid">
					<div class="agile_footer_grid">
					<h5>Latest News</h5>
						<ul class="agileits_w3layouts_footer_grid_list">
							<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								<a href="#" data-toggle="modal" data-target="#myModal1">Lorem ipsum neque vulputate </a>
							</li>
							<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								<a href="#" data-toggle="modal" data-target="#myModal1">Dolor amet sed quam vitae</a>
							</li>
							<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								<a href="#" data-toggle="modal" data-target="#myModal1">Lorem ipsum neque, vulputate </a>
							</li>
							<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								<a href="#" data-toggle="modal" data-target="#myModal1">Dolor amet sed quam vitae</a>
							</li>
							<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								<a href="#" data-toggle="modal" data-target="#myModal1">Lorem ipsum neque, vulputate </a>
							</li>
						</ul>
					</div>
					<h5>Stay in Touch</h5>
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email Id" required="">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="copyright">
	           <p>© 2020 Gift. All rights reserved | Design by Mrh Bappy</a></p>
        </div>
  </div>
  <!-- Modal1 -->
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Prezzie</h4>
										<img src="{{asset('frontend/images/f2.jpg')}}" alt=" " class="img-responsive">
										<h5>Integer lorem ipsum dolor sit amet </h5>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, rds which don't look even slightly believable..</p>
									</div>
								</div>
							</div>
						</div>
						<!-- //Modal1 -->

<!--//footer-->

	<!-- js -->
<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
		  // Slideshow 4
		  $("#slider4").responsiveSlides({
			auto: true,
			pager:true,
			nav:false,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}
		  });
	
		});
	</script>
<!-- for-Clients -->
		<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
			<!-- requried-jsfiles-for owl -->
	        <script>
			    $(document).ready(function() {
			      $("#owl-demo2").owlCarousel({
			        items : 1,
			        lazyLoad : false,
			        autoPlay : true,
			        navigation : false,
			        navigationText :  false,
			        pagination : true,
			      });
			    });
			  </script>
			<!-- //requried-jsfiles-for owl -->
	<!-- //for-Clients -->
<!-- cart-js -->
	<script src="{{asset('frontend/js/minicart.min.js')}}"></script>
	<script>
		// Mini Cart
		paypal.minicart.render({
			action: '#'
		});

		if (~window.location.search.indexOf('reset=true')) {
			paypal.minicart.reset();
		}
	</script>
<!-- //cart-js --> 
<!-- video-bg -->
<script src="{{asset('frontend/js/jquery.vide.min.js')}}"></script>
<!-- //video-bg -->
<!-- Nice scroll -->
<script src="{{asset('frontend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<!-- //Nice scroll -->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>


<!-- //for bootstrap working -->

<script type="text/javascript">
$(document).ready(function(){
    
    $("#regi").click(function(){
       //$("#reg").show();
       //$("#log").hide();
       $('#reg, #log').toggle(200);

    });
    
    $("#logi").click(function(){
        $('#reg, #log').toggle(200);
    });
  
});
</script>
</body>
</html>