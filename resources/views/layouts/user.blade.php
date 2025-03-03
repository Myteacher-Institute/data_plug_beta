<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
     <link rel="stylesheet" href="{{ asset('css/nin.css') }}">

     <link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">

     <!-- Scripts -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
     {{-- <script src="profile.js"></script> --}}
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   




     {{-- <script>

    </script>
         --}}

</body>
</html>