<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @php
    $settings = App\Models\Settings::where('id',1)->first();
@endphp
<title>@if ($settings) {{ $settings->website_title }}@endif</title>
<link rel="stylesheet" href={{ asset('css/style1.css') }}>
<link rel="stylesheet" href={{ asset('assset/fontawesome-free-6.5.2-web/css/all.css') }}>
<link rel="stylesheet" href={{ asset('css/style3.css') }}>
<link rel="stylesheet" href={{ asset('css/style4.css') }}>
<link rel="stylesheet" href={{ asset('css/swipper.css') }}>
<link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


    @include('includes.nav')

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

        <div class="services">
            <div class="services-box">
                <div class="service-box1">
                    <video src="{{ asset('images/1081905350-preview.mp4') }}" controls autoplay loop></video>
                </div>
                <video src="{{ asset('images/1073657882-preview.mp4') }}" class="service-box2" controls autoplay loop>
            </div>

        {{-- @include('includes.service') --}}
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


        @include('includes.footer')
        
</body>
</html>





































{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'public/css/style3.css', 'public/css/style4.css', 'public/css/swipper.css']) --}}
{{-- @extends('layouts.app');

@section('content')
@include('includes.service')
<div class="about">
    <h1 class="about">About</h1>

    <p class="about-txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, voluptate! Eum vel similique id nostrum dolorem dignissimos nemo beatae illum aperiam facilis ex, pariatur repellendus fugit? Distinctio similique, quisquam minima iste labore vero suscipit consectetur aut natus corporis laborum asperiores a. Quo repellat provident doloribus voluptatibus ipsa accusantium eveniet, mollitia sunt ut, ratione nobis ullam ea id repudiandae fugit. Aperiam deserunt mollitia unde commodi error eum, tempore dolorem maxime inventore! Tempore, amet a! Quaerat, nobis rem tenetur recusandae ullam voluptatem voluptas? Tempora, qui fugiat quam quis laudantium perspiciatis dicta nemo adipisci in minus voluptates incidunt accusantium, ullam, et voluptate voluptatibus at tempore nobis? Officia eius quos nostrum itaque praesentium facilis dicta harum qui amet aut doloribus saepe non consectetur accusamus, corrupti, ipsum assumenda cupiditate vero perspiciatis, eveniet culpa ex. Quam ullam dolorem, ab aut, dignissimos quo enim aspernatur tenetur reiciendis nihil, repellat temporibus id a. Velit modi similique assumenda ad, expedita voluptatibus provident distinctio ab reiciendis odit consequuntur excepturi! Ea sint natus consectetur maiores laboriosam. Odit mollitia culpa fuga? Molestias temporibus laboriosam debitis ad voluptatem quas eveniet ipsa, inventore voluptatum quos quae magni non quo rem recusandae culpa possimus, velit dolore quaerat cumque! Facilis asperiores nulla voluptates modi nobis fuga tenetur animi, repellat, amet, quibusdam maiores eos velit aut officia sequi nesciunt cum. Repellat et delectus quisquam in! Esse iste praesentium eligendi! Voluptatem distinctio vitae harum repellendus cumque commodi, cupiditate aut eaque debitis consequatur obcaecati neque architecto maiores magnam sint natus voluptates hic. Adipisci debitis est qui neque, iusto voluptatibus. Ipsum tempora impedit blanditiis amet quaerat quia rem reiciendis sint, quas, laudantium tempore odit iste obcaecati laborum eos magni maiores asperiores architecto alias corporis, deleniti optio pariatur! Laboriosam, aut cumque rerum, ex fugit pariatur impedit ducimus, maiores cum ullam deleniti magni? Qui repellat nemo fugiat ullam recusandae consequuntur, reiciendis odit repudiandae eligendi sapiente asperiores deleniti saepe fugit dolorem commodi reprehenderit. Cum temporibus reprehenderit dicta aliquid praesentium quas eveniet modi animi. Voluptates repellendus repudiandae quam nam. Recusandae ex debitis amet velit animi sed ut, corporis eveniet esse dolor quis quod doloribus aut repudiandae libero veniam beatae ratione, voluptate laborum similique nam quam enim. Deserunt molestiae accusantium officia perferendis fugiat enim tenetur harum id temporibus illum excepturi iure nihil exercitationem, eum in at voluptatum labore fuga rem ad nisi illo? Natus modi nobis ex asperiores repellendus, molestias minima quo ad voluptatum repellat est autem, eveniet distinctio aut officia eum provident temporibus rerum!</p>
</div>
@include('includes.footer')
@endsection --}}
