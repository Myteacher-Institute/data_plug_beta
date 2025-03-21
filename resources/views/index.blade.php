@extends('layouts.app')


@section('content')
<div class="hero">

    
    <div class="content">
        <h1 class="arc">Buy<br>Data</h1>
        @if ($settings)
            <p class="arc">{{ $settings->website_title }} is a new media platform that make it easy to buy data at affordable price
            in any part of the World. Now let's explore all it's amazing features.</p>
        @else
            <p class="arc"> is a new media platform that make it easy to buy data at affordable price
            in any part of the World. Now let's explore all it's amazing features.</p>
        @endif
        
        @if (Auth::check())
        <a href={{ url('home') }} class="btn arc">Dashboard</a>
        @else
        <a href={{ url('register') }} class="btn arc">Join now</a>
        @endif
    </div>
    <img src={{ asset('images/data.png.jpg') }} class="features-img arc">

    <marquee>
        <img src="{{ asset('images/ait.png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('images/download (7).png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('images/nine.png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('images/glo.jpg') }}" alt="" style="margin-left: 20px">
    </marquee>
</div>
<div class="services">
    <h1 class="our-services">Our Services</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Fund your Account, make Transfers, Pay Bills') }}</h2>

            <p class="services-text">
                {{ __('
                Live life on your own terms! Add money to your
                DataPlug Wallet and transfer to other bank accounts for
                free Enjoy bonuses on airtime & data top Ups and fast bill payments at the
                extra charge') }}
            </p>
        </div>
        <img
            src="
                {{
                    asset('images/stock-vector-e-store-and-e-commerce-website-for-shopping-online-flat-line-vector-illustration-of-cute-woman-1855045951.jpg') }}" alt="" class="service-box2">
    </div>
</div>

<div class="services">
    <h1 class="our-services" style="text-align: center;">About Us</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Your Favourite payment methods') }}</h2>

            <p class="services-text">
                {{ __('
                we as dataPlug don"t just give you a Realiable Banking activity 
                both also give your account serve banking') }}
            </p>
        </div>
        <img
            src="
                {{
                    asset('assset/img/SmartCity_connect_900.jpg') }}" alt="" class="service-box2">
    </div>

    {{-- <div class="services">
        <div class="services-box">
            <div class="service-box1">
                <video src="{{ asset('images/1081905350-preview.mp4') }}" controls autoplay loop></video>
            </div>
            <video src="{{ asset('images/1073657882-preview.mp4') }}" class="service-box2" controls autoplay loop>
        </div>
    </div> --}}

    <div class="services">
        <h1 class="our-services">NIN Services</h1>
        <div class="services-box">
            <div class="service-box1">
                <h2 class="services-head-text">{{ __('NIN Modification & Retriever we got you') }}</h2>
    
                <p class="services-text">
                    Niger people,  don't end up like this people, Drop your details and it will be solve ASP
                </p>
            </div>
            <img
                src="
                    {{
                        asset('images/ninpeople.jpeg') }}" alt="" class="service-box2">
        </div>
    </div>

@include('includes.testimony')
@include('includes.contact')
@endsection
