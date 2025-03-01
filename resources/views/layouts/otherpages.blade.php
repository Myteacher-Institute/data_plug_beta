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
    <link rel="stylesheet" href={{ asset('css/features.css') }}>
    <link rel="stylesheet" href={{ asset('css/how.css') }}>
    <link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    @include('includes.nav')
    @yield('content')

    <script src="{{ asset('assset/js/jquery.min.js') }}"></script>
    <script>
        // import linkWrappe from 'assset/js/footer.js';

        // const regBtnHide = document.querySelector('.reg');
        const harmBurger = document.querySelector('.fa-bars');

        // regBtnHide.addEventListener('click', () => regShow())

        harmBurger.addEventListener('click', () => navList())

        function regShow() {
            $('.reg-btn').toggle();
        }

        function navList() {
            $('.ul').toggle();
        }

    </script>
        <script src="{{ asset('assset/js/footer.js') }}"></script>
        <script src="{{ asset('assset/js/swipper.js') }}"></script>
</body>
</html>
