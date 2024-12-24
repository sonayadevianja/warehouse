<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jatinom Poultry</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Bootstrap Icons (if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="template.css">

    <!-- Custom Inline CSS for Dropdown Visibility -->
    <style>
        /* Menampilkan dropdown ketika kelas 'show' ditambahkan */
        .dropdown-menu {
            display: none; /* Pastikan menu tidak ditampilkan secara default */
        }

        .dropdown-menu.show {
            display: block; /* Menampilkan dropdown ketika kelas 'show' ditambahkan */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('layouts.navbar')

        <!-- Main Content -->
        @yield('content')

        <!-- SweetAlert (if needed) -->
        @include('sweetalert::alert')

        <!-- Stack additional scripts -->
        @stack('scripts')
    </div>

    <!-- Bootstrap JS (placed before closing body tag for better performance) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
