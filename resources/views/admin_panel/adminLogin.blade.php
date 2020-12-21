<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/login.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/login/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login/main.css')}}">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Admin Login</title>

  </head>

<body style="font-family: sans-serif !important;">
  <div class="limiter">
		<div class="container-login100">
      <span class="login100-form-title text-center">
        Admin Portal
	  </span>

			<div class="login-page wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				@if(session('message'))
                <div class="alert alert-danger" role="alert">
                    {{session('message')}}
                </div>
                @endif
				<form method="POST" id="loginForm" class="login-form login100-form validate-form flex-sb flex-w">
          {{csrf_field()}}

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate ="Username is required">
						<input class="input100" type="text" name="Username" id="Username" required value="admin">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate ="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="Password" id="Password" required value="admin	">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

</body>
</html>
