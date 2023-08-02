<style>
    .sidebar {
  z-index: 9; }
  .sidebar .nav > li > a {
    padding: 18px 30px;
    color: #AEB7C2;
    border-left: 5px solid transparent; }
    .sidebar .nav > li > a:hover, .sidebar .nav > li > a:focus, .sidebar .nav > li > a.active {
      color: #fff;
      background-color: transparent; }
      .sidebar .nav > li > a:hover i, .sidebar .nav > li > a:focus i, .sidebar .nav > li > a.active i {
        color: #00AAFF; }
    .sidebar .nav > li > a:focus, .sidebar .nav > li > a.active {
        background-color: #8C5630;
      border-left-color: #00AAFF; }
    .sidebar .nav > li > a[data-toggle="collapse"] .icon-submenu {
      display: inline-block;
      vertical-align: middle;
      *vertical-align: auto;
      *zoom: 1;
      *display: inline;
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      -ms-transition: all 0.2s ease-out;
      -o-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;
      float: right;
      position: relative;
      top: 5px;
      font-size: 12px;
      line-height: 1.1;
      -moz-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      transform: rotate(-90deg); }
    .sidebar .nav > li > a[data-toggle="collapse"].collapsed .icon-submenu {
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg); }
    .sidebar .nav > li > a .badge {
      font-weight: 400;
      background-color: #F9354C; }
  .sidebar .nav {
    /* submenu */ }
    .sidebar .nav i {
      margin-right: 10px;
      font-size: 18px; }
    .sidebar .nav span {
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      position: relative;
      top: -2px; }
    .sidebar .nav .nav {
      background-color: #C79A56; }
      .sidebar .nav .nav > li > a {
        padding-left: 60px;
        padding-top: 10px;
        padding-bottom: 10px; }
        .sidebar .nav .nav > li > a:focus, .sidebar .nav .nav > li > a.active {
          background-color: transparent;
          border-left-color: transparent; }
        .sidebar .nav .nav > li > a.active a {
          color: #fff; }

    </style>
<!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-lg-5" style="background-color:white;">
            <img style="width: 120px; height: 80px;" src="{{ Vite::asset('resources/images/1.jpeg') }}" alt="">
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                {{-- <div class="navbar-nav m-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('barang.index') }}" class="nav-item nav-link">Barang</a> --}}
                    {{-- <a href="{{ route('History.index') }}" class="nav-item nav-link">History</a> --}}
                    {{-- <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              History
                            </a>
                            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                              <li><a class="dropdown-item" href="{{ route('History_in.index') }}">History Barang Masuk</a></li>
                              <li><a class="dropdown-item" href="{{ route('History_out.index') }}">History Barang Keluar</a></li>
                            </ul>
                          </li>
                        </ul>
                    </div> --}}
                {{-- </div> --}}
                {{-- <a href=" " class="btn btn-primary py-2 px-4 d-none d-lg-block" ><img style="width: 25px; height: 30px;" src="img/admin.png" alt=""> Admin</a> --}}
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
    </div>
<!-- Navbar End -->
<div id="sidebar-nav" class="sidebar" style="width: 260px; height: 100%; float: left; background-color: #C79A56; position: fixed; left: 0;  padding-top: 130px;">
    
</div>
