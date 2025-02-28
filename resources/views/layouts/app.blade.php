<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="{{ asset('css/swipper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    {{-- <link rel="stylesheet" href={{ asset('css/responsive.css') }}> --}}
    {{-- <link rel="stylesheet" href={{ asset('css/style.css') }}> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">



    <link rel="shortcut icon" @if ($settings) href={{  asset('uploads/'.$settings->favicon) }}@endif type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" style="background: #fff;">

        @include('includes.nav')

        <main class="">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>

    <script src="{{ asset('assset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assset/js/custom.js') }}"></script>
    <script src="{{ asset('assset/js/bootstrap.js') }}"></script>

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









{{--

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
--}}
