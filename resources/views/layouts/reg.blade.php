<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @php
    $settings = App\Models\Settings::where('id',1)->first();
@endphp
<title>@if ($settings) {{$settings->website_title }}@endif</title>
<meta name="keywords" content="@if ($settings) {{$settings->keywords }}@endif">
<meta name="description" content="@if ($settings) {{$settings->description }}@endif">

<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" href="{{ asset('assset/fontawesome-free-6.5.2-web/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
<link rel="stylesheet" href="{{ asset('css/style4.css') }}">
<link rel="stylesheet" href="{{ asset('css/regis.css') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


<link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>z
    @yield('section')

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
</body>
</html>