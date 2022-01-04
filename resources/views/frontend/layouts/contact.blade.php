@extends('frontend/layouts/master')
@section('banner')

		<div class="center-container inner-container">

				<!-- banner-text -->
			<h2 class="inner-heading-agileits-w3layouts">Contact Us</h2>
			<!--banner Slider starts Here-->
      	</div>
  
@endsection
@section('body')
<!-- //banner -->
<!--contact-->
<div class="contact-top-agileinfo">
	<div class="container">
		<h3 class="title-w3layouts contact-head">We Love to Meet New people <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell" aria-hidden="true"></i></h3>
	<div class="col-md-6 contact-left-wthree">
	<h5>Customer Care</h5>
	<div class="customer-info-w3ls">
		<img src="{{asset('frontend/images/team1.jpg')}}" alt="" />
		<div class="customer-right">
			<h6>Carl Haddon</h6>
			<p>Lorem Ipsum<span>Toll free +012 345 6780</span></p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="customer-info-w3ls">
		<img src="{{asset('frontend/images/team3.jpg')}}" alt="" />
		<div class="customer-right">
			<h6>Mark Johnson</h6>
			<p>Lorem Ipsum<span>Toll free +045 123 6780</span></p>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	<div class="col-md-6 contact-right-wthree">
		<h5>Others Ways to Connect</h5>
		<div class="connect-w3-agile">
			<i class="fa fa-facebook-square ione" aria-hidden="true"></i>
			<p>Suspendisse in nisl at ipsum molestie digni <a href="#">like us on Facebook</a> esque est nisi.</p>
			<div class="clearfix"></div>
		</div>
		<div class="connect-w3-agile">
			<i class="fa fa-twitter-square itwo" aria-hidden="true"></i>
			<p>Suspendisse in nisl at ipsum molestie digni <a href="#">Follow us on twitter</a> esque est nisi.</p>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
<!-- contact-form-->
<div class="jarallax contact-bottom" id="contact">
	<div class="col-md-7 contact-right-w3l">
		<h3 class="title-w3layouts white-agileits">Reach Out to Us <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell white-agileits" aria-hidden="true"></i></h3>
		<form action="#" method="post">
			<input type="text" class="name" name="name" placeholder="First Name" required="">
			<input type="text" class="name" name="name" placeholder="Last Name" required="">
			<input type="email" class="name" name="name" placeholder="Email" required="">
			<input type="text" class="name" name="name" placeholder="Subject" required="">
			<textarea placeholder="Your Message" required=""></textarea>
			<input type="submit" value="Send message">
		</form>
	</div>
	<div class="col-md-5 agileits_w3layouts-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.353666243956!2d-0.4564841841736156!3d51.47002227962888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48767234cdc56de9%3A0x8fe7535543f64167!2sHeathrow+Airport+(LHR)!5e0!3m2!1sen!2sin!4v1495523475826"></iframe>
	</div>	
	<div class="clearfix"></div>
</div>

@endsection
