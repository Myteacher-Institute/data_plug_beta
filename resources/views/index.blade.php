@extends('layouts.app')


@section('content')
<div class="hero">

    <div class="content">
        <h1 class="arc">Id<br>Service</h1>
        @if ($settings)
            <p class="arc">{{ $settings->website_title }} Your comprehensive Identity Management platform provides essential support in addressing National Identification Number (NIN) issues, as well as creating personalized company ID cards for staff, school ID cards for students, and offering robust identity management solutions tailored for organizations of all sizes</p>
        @else
        <p class="arc"> Your comprehensive Identity Management platform provides essential support in addressing National Identification Number (NIN) issues, as well as creating personalized company ID cards for staff, school ID cards for students, and offering robust identity management solutions tailored for organizations of all sizes</p>
        @endif
        
        @if (Auth::check())
        <a href={{ url('home') }} class="btn arc">Dashboard</a>
        @else
        <a href={{ url('register') }} class="btn arc">Join now</a>
        @endif
    </div>
    <img src={{ asset('assset/img/id_card_logo.png') }} class="features-img arc">

    <marquee>
        <img src="{{ asset('assset/img/1_whatIsTheNIN.png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('assset/img/2_NINidentifies.png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('assset/img/3_uniqueNIN-600x377.png') }}" alt="" style="margin-left: 20px;height: 475px">
        <img src="{{ asset('assset/img/5_NINSlip.png') }}" alt="" style="margin-left: 20px">
    </marquee>
</div>
<div class="services">
    <h1 class="our-services">Our Services</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Nin Service') }}</h2>

            <p class="services-text">
                {{ __('
                    This is a dedicated service for all matters related to NIN issues, including enrollment and validation processes. For any inquiries or assistance, please feel free to reach out to our service team, who are always ready to help you') }}
            </p>
            <a href="" class="s-btn">Retrieve NIN</a>
            <a href="" class="s-btn">Submit NIN Issue</a>
        </div>
        <img
            src="
                {{
                    asset('assset/img/logoLarge.png') }}" alt="" class="service-box2">
    </div>
</div>

<div class="services">
    <h1 class="our-services">Our Services</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Convert your NIN to a plastic ID Card') }}</h2>

            <p class="services-text">
                {{ __('
                    You have the opportunity to receive a sturdy plastic ID Card that will be delivered straight to you. Take the step to upgrade to a plastic ID Card today and experience the advantages of this service') }}
            </p>
            <a href="" class="s-btn">Request Now</a>
        </div>
        <img
            src="
                {{
                    asset('assset/img/NIMC-NIN-card.jpeg') }}" alt="" class="service-box2">
    </div>
</div>

<div class="services">
    <h1 class="our-services">Our Services</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Identity Cards') }}</h2>

            <p class="services-text">
                {{ __("
                    Let's take the initiative to create Identity Cards for your staff, students, and members. Having a proper identity is crucial in many situations. It not only helps to establish recognition but also enhances security and trust within your community. If you're interested in getting started, feel free to chat with us now to request our quick and efficient service. Your identity matters, and we're here to assist you every step of the way") }}
            </p>
            <a href="" class="s-btn">Chat now to get your ID cards</a>
        </div>
        <img
            src="
                {{
                    asset('assset/img/pngtree-id-card-template-png-image_4995288.jpg') }}" alt="" class="service-box2">
    </div>
</div>


<div class="services">
    <h1 class="our-services" style="text-align: center;">About Us</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Your Favourite payment methods') }}</h2>

            <p class="services-text">
                {{ __('
                    We at DataPlug don’t just provide you with reliable information on activities; we also offer personalized ID cards, whether for educational institutions or businesses') }}
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

    {{-- <div class="services">
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
    </div> --}}

    <div id="responseMessage"></div>

{{-- @include('includes.testimony') --}}
{{-- @include('includes.contact') --}}
@endsection
