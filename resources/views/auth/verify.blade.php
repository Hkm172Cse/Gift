@extends('frontend/layouts/master')

@section('banner')
<div  class="container" style="padding-bottom: 100px ">

                <!-- banner-text -->
        <div class="slider">
                        
            <div class="main-agileinfo" style="margin-left:35px">
                <div class="agileits-top" >
                    

                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif

                <p>{{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},</p>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>


                </div>
            </div>

            </div>
            
      </div>

@endsection

