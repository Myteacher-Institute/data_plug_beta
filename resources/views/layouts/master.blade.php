<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nin.css') }}">
</head>
<body>
    <div id="app">
    @if (session('error'))
        <script>
            // alert('{{ session('error') }}')
            swal("error!", "{{ session('error') }}", "error");
        </script>
    @endif
    @if (session('message'))
        <script>
            // alert('{{ session('message') }}')
            swal("successful!", "{{ session('message') }}", "success");
        </script>
    @endif

        <main>
            @include('includes.admin-menu')

            @yield('content')
        </main>
    </div>


    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/script.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>