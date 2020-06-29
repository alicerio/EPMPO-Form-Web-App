<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/bootstrap/css/bootstrap.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/fonts/iconic/css/material-design-iconic-font.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/animate/animate.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/css-hamburgers/hamburgers.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/animsition/css/animsition.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/select2/select2.min.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendor/daterangepicker/daterangepicker.css') }}" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login_util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login_main.css') }}" />

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form log_in_form" method="POST" action="{{ route('login') }}">
                    @csrf

					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="/docs/images/elmpologoblack.png">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input name="email"  id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100" data-placeholder="Email"></span>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100" data-placeholder="Password"></span>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button  type="submit" class="login100-form-btn">
                                {{ __('Login') }}
                            </button>						
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="{{ asset('docs/js/tester.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/bootstrap/js/popper.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/select2/select2.min.js')}}"></script>
     <!--===============================================================================================-->
    <script src="{{ asset('/css/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('/css/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('docs/js/login_functionality.js')}}"></script>
    <!--===============================================================================================--> 

</body>
</html>