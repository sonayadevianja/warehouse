<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Jatinom Blitar') }}</title>

    <link href="/style.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1>Welcome To Jatinom Blitar Poultry Website</h1>
            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi bi-rocket-takeoff"></i> Mashook</a>
        </div>
    </div>
    <!-- Header End -->
    <!-- About Start -->
    <div class="container-fluid py-4">
        <div class="container">
                <div class="col-lg-7">
                    <h1 class="mb-4">Jatinom Blitar</h1>
                    <p class="mb-4">Peternakan Ayam Petelur dan Pusat Telur di Kebonduren, Ponggok, Blitar</p>

                </div>
            </div>
        </div>
    <!-- About End -->
</body>
</html>
