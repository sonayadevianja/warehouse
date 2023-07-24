@extends('layoutauth.app')
@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

              <form class="card-body cardbody-color p-lg-5"  method="POST" action="{{ route('login') }}">
                @csrf

                <div class="text-center">
                    <h1>LOGIN</h1>
                  <img src="/img/LGO RSCOLL.png" class= "img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                  width="200px" alt="profile">
                </div>

                <div class="mb-3">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>



                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-3">
                  <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center"> <button type="submit" style="background-color: #F1DEC9" class="btn btn-primary">
                    {{ __('Login') }}
                </button></div>


                <div id="forgotPass" class="form-text text-center mb-5 text-dark">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link"  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                     </a>
                     @endif
                </div>
               

                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                    Not Registered? <a href="{{ route('register') }}" class="text-dark fw-bold"> Create an
                    Account</a>
                </div>
              </form>



@endsection
