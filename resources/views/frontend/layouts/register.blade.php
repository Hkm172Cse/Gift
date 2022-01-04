
@extends('frontend/layouts/master')
@section('banner')
	
		<div  class="container" style="padding-bottom: 100px ">

				<!-- banner-text -->
				<div class="slider">
						
			<div class="main-agileinfo" style="margin-left:35px">
				<div class="agileits-top none-sq-price" >
		
					<form id="" action="{{ route('register') }}" method="post" >
						@csrf
						
						 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">


                                <input id="phone" type="text" class="form-control" name="phone" required  placeholder="Phone">

                                 @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input id="postal" type="text" class="form-control" name="postal" required  placeholder="Postal Code">

                                 @error('postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="city" type="text" class="form-control" name="city" required  placeholder="City">

                                 @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="address" type="text" class="form-control" name="addr" required  placeholder="Address">

                                 @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                 

                                 @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


								<button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        
					</form>
				</div>
			</div>

			</div>
			
      </div>
      
   </div>
@endsection
@section('body')
	<div class="features">
	<div class="container">
		<div class="heading-setion-w3ls">
			<h2 class="title-w3layouts">What we Offer <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell" aria-hidden="true"></i></h2>
		</div>
		<div class="col-md-4 servies-agileinfo">
		<p class="pink-w3ls">Making your events more colourful</p>
		<p class="para-w3agileits">We provide the best colletion of prezzie with awesome offers & discounts .</p>
		</div>
		<div class="col-md-4 servies-agileinfo">
			<ul>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Mothers day</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Valentine's Day</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Wedding Day</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Anniversary</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Get well</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>House warming</li>
			</ul>
		</div>
		<div class="col-md-4 servies-agileinfo">
			<ul>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Retirement</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>New baby</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Business</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Birth days</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Graduation day</li>
				<li><i class="fa fa-diamond" aria-hidden="true"></i>Return gifts</li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //we-offer -->
<div class="sale-w3ls">
	<div class="container">
		<h6 class="white-agileits">Sale! <span>40%</span> off</h6>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius lectus vitae porttitor fringilla. Donec turpis orci, elementum a nunc quis, maximus varius ipsum. Sed bibendum ex in dignissim bibendum.</p>
		<a href="buynow.html" class="botton-agileits">Read more</a>
	</div>
</div>

<!-- services -->
	<div class="services">
		<div class="container">
			<div class="w3l-about-grids">
				<div class="col-md-6 w3ls-about-left">
				<div class="heading-setion-w3ls">
					<h3 class="title-w3layouts white-agileits">Features <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell white-agileits" aria-hidden="true"></i></h3>
				</div>
					<div class="agileits-icon-grid">
						<div class="icon-left hvr-radial-out">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Suspendisse consectetur dapibus volutpat.</h5>
							<p class="para-w3-agile">Phasellus dapibus felis elit, sed accumsan arcu gravida vitae. Nullam aliquam erat at lectus ullamcorper, nec interdum neque hendrerit.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="agileits-icon-grid">
						<div class="icon-left hvr-radial-out">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Lorem ipsum dolor sit amet</h5>
							<p class="para-w3-agile">Phasellus dapibus felis elit, sed accumsan arcu gravida vitae. Nullam aliquam erat at lectus ullamcorper, nec interdum neque hendrerit.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="agileits-icon-grid">
						<div class="icon-left hvr-radial-out">
							<i class="fa fa-paper-plane" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Suspendisse consectetur dapibus volutpat.</h5>
							<p class="para-w3-agile">Phasellus dapibus felis elit, sed accumsan arcu gravida vitae. Nullam aliquam erat at lectus ullamcorper, nec interdum neque hendrerit.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-6 w3ls-about-right">
				<div class="heading-setion-w3ls">
					<h3 class="title-w3layouts white-agileits">They Say <i class="fa fa-bell-o" aria-hidden="true"></i><i class="fa fa-bell white-agileits" aria-hidden="true"></i></h3>
				</div>
					<div class="w3ls-about-right-img">
						<div class="{{asset('frontend/images/test-gri1')}}">
							<div id="owl-demo2" class="owl-carousel">
								<div class="test-grid1">
									<img src="{{asset('frontend/images/team1.jpg')}}" alt="" class="img-r">
									<h4>Mark Henry</h4>
									<span>CUSTOMER 1</span>
									<p>Lorem ipsum dolor sit amet, Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
								</div>	
								<div class="agile">
									<div class="test-grid1">
										<img src="{{asset('frontend/images/team2.jpg')}}" alt="" class="img-r">
										<h4>Joseph Carl</h4>
										<span>CUSTOMER 2</span>
										<p>Lorem ipsum dolor sit amet, Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
									</div>	
								</div>
								<div class="agile">
									<div class="test-grid1">
										<img src="{{asset('frontend/images/team3.jpg')}}" alt="" class="img-r">
										<h4>John Mark</h4>
										<span>CUSTOMER 3</span>
										<p>Lorem ipsum dolor sit amet, Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
									</div>	
								</div>					
							</div>
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

@endsection


