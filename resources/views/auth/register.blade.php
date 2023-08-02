<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Rizal Salsa Collection</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="template.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
                            <form class="card-body cardbody-color p-lg-5"  method="POST" action="{{ route('register') }}">
                                @csrf
							<div class="header">
								<div class="logo text-center"><img src="{{ Vite::asset('resources/images/1.jpeg') }}" alt="Klorofil Logo" style="width: 50%; margin-top:-40px;"></div>
								<p class="lead">Register Your Account</p>
							</div>

							<form class="form-auth-small" action="index.php">
                                <div class="form-group">
									<label for="name" class="control-label sr-only">{{ __('Name') }}</label>
                                    <input id="name" placeholder="Name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
								</div>

								<div class="form-group">
									<label for="email" class="control-label sr-only">{{ __('Email Address') }}</label>
                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
								</div>

								<div class="form-group">
									<label for="password" class="control-label sr-only">{{ __('Password') }}</label>
									<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
								</div>

                                <div class="form-group">
									<label for="password" class="control-label sr-only">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"
                                    required autocomplete="new-password">
								</div>

								<button type="submit" class="btn btn-lg btn-block" style="background-color: #C79A56; color: black;">{{ __('Register') }}</button>
								<div class="bottom">
									<span class="helper-text"><a href="{{ route('login') }}" style="color: #C79A56;">Already have an Account?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay">
                        {{-- style="background-image : {{ Vite::asset('resources/images/08e9f39211196b9e329ea34c6067e44570d6c8cb_s2_n3_y1.jpg') }}"
                            style="width: 58%; height: 100%; float: right; position: relative; background-repeat: no-repeat;
                            background-size: cover;"> --}}
                        </div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
