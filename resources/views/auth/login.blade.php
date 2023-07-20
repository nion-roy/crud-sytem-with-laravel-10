<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }} - Sign In</title>

	<!-- Toastr Css -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		section {
			position: relative;
			min-height: 100vh;
			background-color: #f8dd30;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}

		section .container {
			position: relative;
			width: 800px;
			height: 500px;
			background: #fff;
			box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
			overflow: hidden;
		}

		section .container .user {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			display: flex;
		}

		section .container .user .imgBx {
			position: relative;
			width: 50%;
			height: 100%;
			background: #ff0;
			transition: 0.5s;
		}

		section .container .user .imgBx img {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		section .container .user .formBx {
			position: relative;
			width: 50%;
			height: 100%;
			background: #fff;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 40px;
			transition: 0.5s;
		}

		section .container .user .formBx form h2 {
			font-size: 18px;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 2px;
			text-align: center;
			width: 100%;
			margin-bottom: 10px;
			color: #555;
		}

		section .container .user .formBx form input {
			position: relative;
			width: 100%;
			padding: 10px;
			background: #f5f5f5;
			color: #333;
			border: none;
			outline: none;
			box-shadow: none;
			margin: 8px 0;
			font-size: 14px;
			letter-spacing: 1px;
			font-weight: 300;
		}

		section .container .user .formBx form input[type='submit'] {
			max-width: 100px;
			background: #677eff;
			color: #fff;
			cursor: pointer;
			font-size: 14px;
			font-weight: 500;
			letter-spacing: 1px;
			transition: 0.5s;
		}

		section .container .user .formBx form .signup {
			position: relative;
			margin-top: 20px;
			font-size: 12px;
			letter-spacing: 1px;
			color: #555;
			text-transform: uppercase;
			font-weight: 300;
		}

		section .container .user .formBx form .signup a {
			font-weight: 600;
			text-decoration: none;
			color: #677eff;
		}

		@media (max-width: 991px) {
			section .container {
				max-width: 400px;
			}

			section .container .imgBx {
				display: none;
			}

			section .container .user .formBx {
				width: 100%;
			}
		}
	</style>

</head>

<body>
	<section>
		<div class="container">
			<div class="user signinBx">
				<div class="imgBx"><img
						src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg"
						alt="" /></div>
				<div class="formBx">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<h2>Sign In</h2>
						<input type="email" name="email" placeholder="Username" />
						<input type="password" name="password" placeholder="Password" />
						<input type="submit" value="Login" />
						<p class="signup">
							Don't have an account ?
							<a href="{{ route('register') }}">Sign Up.</a>
						</p>
					</form>
				</div>
			</div>

		</div>
	</section>


	<!-- Jquery Core Js -->
	<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
	<!-- Toastr Js -->
	<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>

	@include('sweetalert::alert')
	
	{!! Toastr::message() !!}

	<script>
		@if($errors->any())
			@foreach($errors->all() as $error)
				toastr.error('{{ $error }}','Error',{
					progressBar:'true',
					positionClass: 'toast-top-right',
				});
			@endforeach
    @endif
	</script>

</body>

</html>