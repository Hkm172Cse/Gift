
@extends('frontend/layouts/master')
@section('banner')


<div  class="container" style="padding-bottom: 100px ">

                <!-- banner-text -->
    <div class="slider">
                        
            <div class="main-agileinfo" style="margin-left:35px">
                <div class="agileits-top none-sq-price" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>

                    <p style="margin-top: 17px;"><a style="color: white; text-decoration: underline;" href="{{route('/')}}"  class=" mt-3 btn " />Login form here</a></p>

                    </form>


                </div>
            </div>

            </div>
            
      </div>
@endsection
