<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('dist/js/app.js') }}" defer></script>

    <link href="{{ asset('dist/img/logo/logo4.png') }}" rel="icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">

    <link href="https://indrijunanda.github.io/RuangAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://indrijunanda.github.io/RuangAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://indrijunanda.github.io/RuangAdmin/css/ruang-admin.min.css" rel="stylesheet">
</head>
@include('sweetalert::alert')

<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/js/ruang-admin.min.js"></script>
</body>


</html>

</html>

