@extends('layouts.app')


@section('content')
<div class="hero">


    <div class="content">
        <h1 class="arc">{{$settings->website_title}}<br>Service</h1>
        @if ($settings)
            <p class="arc">At {{ $settings->website_title }} we provide comprehensive identity management services specifically designed for individuals. Our offerings include services such as National Identification Number (NIN) enrollment, the issuance of plastic ID cards, and retrieval of NIN information for our clients. We aim to facilitate a smooth and efficient process for anyone needing assistance with these identity management needs</p>
        @else
        <p class="arc"> we provide comprehensive identity management services specifically designed for individuals. Our offerings include services such as National Identification Number (NIN) enrollment, the issuance of plastic ID cards, and retrieval of NIN information for our clients. We aim to facilitate a smooth and efficient process for anyone needing assistance with these identity management needs</p>

        @endif
        
        @if (Auth::check())
        <a href={{ url('home') }} class="btn arc">Dashboard</a>
        @else
        <a href={{ url('register') }} class="btn arc">Join now</a>
        @endif
    </div>
    
    <img src={{ asset('assset/img/first.jpeg') }} class="features-img arc">

    <marquee>
        <img src="{{ asset('assset/img/1_whatIsTheNIN.png') }}" alt="" style="margin-left: 20px">
        <img src="{{ asset('assset/img/first.jpeg') }}" alt="" style="margin-left: 20px;height: 475px;width: 600px">
        {{-- <img src="{{ asset('assset/img/3_uniqueNIN-600x377.png') }}" alt="" style="margin-left: 20px;height: 475px"> --}}
        <img src="{{ asset('assset/img/5_NINSlip.png') }}" alt="" style="margin-left: 20px">
    </marquee>
</div>
<div class="services">
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

                    asset('assset/img/banner.jpeg') }}" alt="" class="service-box2">
    </div>
</div>

<div class="services">

    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Convert your NIN to a plastic ID Card') }}</h2>

            <p class="services-text">
                {{ __('
                    We create identity cards for Orgnizations, Schools, Individuals and Agencies') }}
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
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Identity Cards for individuals orginizations school') }}</h2>

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


<div class="services" id="about">
    <h1 class="our-services" style="text-align: center;">About Us</h1>
    <div class="services-box">
        <div class="service-box1">
            <h2 class="services-head-text">{{ __('Identity cards for individuals, organizations and schools') }}</h2>

            <p class="services-text">
                At {{ $settings->website_title }} we provide comprehensive identity management services specifically designed for individuals. Our offerings include services such as National Identification Number (NIN) enrollment, the issuance of plastic ID cards, and retrieval of NIN information for our clients. We aim to facilitate a smooth and efficient process for anyone needing assistance with these identity management needs
            </p>
            <a href="" class="s-btn">Chat us now</a>
        </div>
    </div>
</div>
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
    </div>


    </div> --}}

    {{-- <div id="responseMessage"></div> --}}

{{-- @include('includes.testimony') --}}
{{-- @include('includes.contact') --}}
@endsection
