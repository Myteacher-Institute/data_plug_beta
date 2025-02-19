<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    @php
        $settings = App\Models\Settings::where('id',1)->first();
    @endphp
    <title>@if ($settings) {{$settings->website_title }}@endif</title>
    <meta name="keywords" content="@if ($settings) {{$settings->keywords }}@endif">
    <meta name="description" content="@if ($settings) {{$settings->description }}@endif">
    <link rel="stylesheet" href={{ asset('assset/fontawesome-free-6.5.2-web/css/all.css') }}>

    <!-- ===================================our style sheet ============================== -->
     <link rel="stylesheet" href="{{asset('assset/dashboard.css')}}">
     <link rel="stylesheet" href="{{asset('assset/help.css')}}">
     <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
     <link rel="stylesheet" href="{{ asset('css/tin.css') }}">

     <link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">

     <!-- Scripts -->
     @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">

        <main class="py-4">
            @include('includes.user-nav')

            @yield('content')
        </main>
    </div>


    <script src="dashboard.js"></script>
    <!-- <script src="pre-loader.js"></script> -->
     <script src="profile.js"></script>
     
</body>
</html>