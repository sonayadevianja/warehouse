@php
    $currentRouteName = Route::currentRouteName();
@endphp
<style>
    li {
        list-style: none;
        margin: 0px 0 20px 0;
    }

    .active {
        background-color: #8C5630;
        /* Highlight color */
        color: #ffffff;
        /* Ensure text is visible on dark background */
        padding: 5px 10px;
        /* Add padding for better spacing */
        display: block;
        /* Make the entire item clickable */
    }


    a {
        text-decoration: none;
        /* color: white; */
    }

    #BarangKuy tbody tr:hover {
        background-color: #C8AE7D;
        cursor: pointer;
    }

    #BarangKuy {
        border-collapse: collapse;
    }

    #BarangKuy th,
    #BarangKuy td {
        border: 1px solid #000000;
        padding: 8px;
    }

    .header-color {
        background-color: #8C5630;
        /* Warna latar belakang untuk judul kolom */
        color: #fbfbfb;
        /* Warna teks untuk judul kolom */
    }

    .overlay {
        display: none;
        position: fixed;
        /* full screen */
        width: 100vw;
        height: 100vh;
        /* transparent black */
        background: rgba(0, 0, 0, 0.7);
        /* middle layer, i.e. appears below the sidebar */
        z-index: 998;
        opacity: 0;
        /* animate the transition */
        transition: all 0.5s ease-in-out;
    }

    /* display .overlay when it has the .active class */
    .overlay.active {
        display: block;
        opacity: 1;
    }

    #dismiss {
        width: 35px;
        height: 35px;
        position: absolute;
        /* top right corner of the sidebar */
        top: 10px;
        right: 10px;
    }
</style>
<!-- Navbar Start -->
{{-- <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-lg-5" style="background-color:white;">
            <img style="width: 120px; height: 80px;" src="{{ Vite::asset('resources/images/1.jpeg') }}" id="button-toggle" alt="">
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <ul class="navbar-nav ms-auto" >
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
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <i class="bi bi-box-arrow-left"></i>
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
        </nav>
    </div> --}}
{{-- <a href="#" class="btn btn-outline-success" id="button-toggle">
        <i class="bi bi-three-dots-vertical"></i>
    </a> --}}
<!-- Navbar End -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #C79A56">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img style="width: 120px; height: 80px;" src="{{ asset('img/nav.png') }}" alt="">
                    </a>
                    <ul class="nav mb-sm-auto mb-0 align-items-smstart" id="menu">
                        <li class="{{ Route::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" style="color: white;">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('barang.index') ? 'active' : '' }}">
                            <a href="{{ route('barang.index') }}" style="color: white;">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">List
                                    Barang</span></a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"
                                style="color: white;">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">History</span>
                            </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li>
                                    <a href="{{ route('history_in') }}" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline {{ Route::is('history_in') ? 'active' : '' }}"
                                            style="color: white;">
                                            History Barang Masuk</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('history_out') }}" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline {{ Route::is('history_out') ? 'active' : '' }}"
                                            style="color: white;">History Barang
                                            Keluar</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        {{-- <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a> --}}
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-left"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- <section class="p-4" id="main-content">
    <button class="btn btn-primary" id="button-toggle">
      <i class="bi bi-list"></i>
    </button>
  </section> --}}
    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {

            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");

            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
