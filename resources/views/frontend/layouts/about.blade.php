
@extends('frontend/layouts/master')
@section('banner')

		<div class="center-container inner-container">

				<!-- banner-text -->
			<h2 class="inner-heading-agileits-w3layouts">About Us</h2>
			<!--banner Slider starts Here-->
      	</div>
   </div>
@endsection
@section('body')
	<div class="about" id="about">
		<div class="agileits_works-top">
				<div class="col-md-4 about-img-right">
					<img src="{{asset('frontend/images/ab.jpg')}}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileits_works-grid two">
				 
				    <div class="wthree-text">
					<div class="heading-setion-w3ls">
						<h3 class="title-w3layouts">In Simple Words <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell" aria-hidden="true"></i></h3>
					</div>
					   <p class="para-w3-agile">Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
					voluptatibus</p>
					   <ul class="about-agile">
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Popular gifts & Toys</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Selection advice</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Gifts for sale</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Shipping and Delivery</li>
					</ul>
					</div>
					
				</div>
				
		    <div class="clearfix"> </div>
		</div>
		
		<div class="agileits_work_grids">
			<ul id="flexiselDemo1">			
				<li>
					<div class="agileits_work_grid view view-sixth">
						<img src="{{asset('frontend/images/g1.jpg')}}" alt=" " class="img-responsive" />
						<div class="mask">
							<a href="buynow.html" class="info">Buy Now</a>
						</div>
					</div>
				</li>
				<li>
					<div class="agileits_work_grid view view-sixth">
						<img src="{{asset('frontend/images/g2.jpg')}}" alt=" " class="img-responsive" />
						<div class="mask">
							<a href="buynow.html" class="info">Buy Now</a>
						</div>
					</div>

				</li>
				<li>
					<div class="agileits_work_grid view view-sixth">
						<img src="{{asset('frontend/images/g3.jpg')}}" alt=" " class="img-responsive" />
						<div class="mask">
							<a href="buynow.html" class="info">Buy Now</a>
						</div>
					</div>
				</li>
				<li>
					<div class="agileits_work_grid view view-sixth">
						<img src="{{asset('frontend/images/g4.jpg')}}" alt=" " class="img-responsive" />
						<div class="mask">
							<a href="buynow.html" class="info">Buy Now</a>
						</div>
					</div>
				</li>
				<li>
					<div class="agileits_work_grid view view-sixth">
						<img src="{{asset('frontend/images/g5.jpg')}}" alt=" " class="img-responsive" />
						<div class="mask">
							<a href="buynow.html" class="info">Buy Now</a>
						</div>
					</div>
				</li>
			</ul>
	
		</div>
	</div>
<!-- //about -->
<!-- team -->
<div class="team" id="team">
	<div class="container">
	<div class="heading-setion-w3ls">
		<h3 class="title-w3layouts">Meet our Team <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell" aria-hidden="true"></i></h3>
	</div>
		<div class="col-md-6 team-left">
			<div class="team1">
				<div class="col-md-4 team-img1">
					<img src="{{asset('frontend/images/team1.jpg')}}" alt="" />
				</div>
				<div class="col-md-4 team-info">
					<h4>Carl Haddon</h4>
					<p>Lorem Ipsum</p>
					<div class="social-icons">
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
			<div class="team2">
				<div class="col-md-4 team-img2">
					<img src="{{asset('frontend/images/team2.jpg')}}" alt="" />
				</div>
				<div class="col-md-4 team-info">
					<h4>Nessa Peters</h4>
					<p>Lorem Ipsum</p>
					<div class="social-icons">
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6 team-right">
			<div class="team3">
				<div class="col-md-4 team-img1">
					<img src="{{asset('frontend/images/team3.jpg')}}" alt="" />
				</div>
				<div class="col-md-4 team-info">
					<h4>Mark Johnson</h4>
					<p>Lorem Ipsum</p>
					<div class="social-icons">
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
			<div class="team4">
				<div class="col-md-4 team-img2">
					<img src="{{asset('frontend/images/team4.jpg')}}" alt="" />
				</div>
				<div class="col-md-4 team-info">
					<h4>Alice Puse</h4>
					<p>Lorem Ipsum</p>
					<div class="social-icons">
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection