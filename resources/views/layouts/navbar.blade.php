<style>
    li {
        list-style: none;
        margin: 20px 0 20px 0;
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        margin-left: -300px;
        transition: 0.4s;
        background-color: #C79A56;
    }

    .active-main-content {
        margin-left: 250px;
    }

    .active-sidebar {
        margin-left: 0;
    }

    #main-content {
        transition: 0.4s;
    }

    </style>
<!-- Navbar Start -->
    <div class="container-fluid p-0">
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
    </div>

<!-- Navbar End -->
<div>
    <div class="sidebar p-4" id="sidebar">
      <li>
        <a class="text-white" href="#">
          Dashboard
        </a>
      </li>
      <li>
        <a class="text-white" href="#">
          Barang
        </a>
      </li>
      <li>
        <a class="text-white" href="#">
          History Barang Masuk
        </a>
      </li>
      <li>
        <a class="text-white" href="#">
          History Barang Keluar
        </a>
      </li>
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
