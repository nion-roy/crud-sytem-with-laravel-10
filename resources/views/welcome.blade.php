<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

</head>

<body>
	<div class="container py-5">

		@if (Route::has('login'))

		@auth
		<a href="@if (Auth::user()->role == 'admin'){{ url('/admin/dashboard') }}@else{{ url('/user/dashboard') }}@endif"
			class="btn btn-success">My Account</a>
		@else
		<div class="d-flex align-items-center justify-content-center" style="height: 84vh; width: 100%">
			<a href="{{ route('login') }}" class="btn btn-danger me-3">Login</a>
			@if (Route::has('register'))
			<a href="{{ route('register') }}" class="btn btn-info">Register</a>
			@endif
		</div>
		@endauth

		@endif


		@auth
		<form action="{{ route('user.course.store') }}" method="post">
			@csrf

			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="name">Full Name</label>
					</div>
					<div class="col-md-6 ">
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name"
							value="@if (Auth::check()) {{ Auth::user()->name }} @endif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="email">Email</label>
					</div>
					<div class="col-md-6 ">
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
							value="@if (Auth::check()) {{ Auth::user()->email }} @endif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="coruse">Selected Course</label>
					</div>
					<div class="col-md-6 ">
						<select name="course_id" id="coruse" class="form-control">
							<option disabled>--selected course--</option>
							@foreach ($courses as $course)
							<option value="{{ $course->id }}">{{ $course->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="contact">Contact</label>
					</div>
					<div class="col-md-6 ">
						<input type="contact" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number"
							value="{{ old('contact') }}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="payment">Payment Methoad</label>
					</div>
					<div class="col-md-6 ">
						<select name="payment" id="payment" class="form-control">
							<option disabled>--selected--</option>
							<option value="Bkash">Bkash</option>
							<option value="Nagad">Nagad</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row align-items-center mb-3">
					<div class="col-md-4 text-end">
						<label class="fomr-label" for="transaction">Transaction</label>
					</div>
					<div class="col-md-6 ">
						<input type="transaction" class="form-control" name="transaction" id="transaction"
							placeholder="Enter Transaction Number" value="{{ old('transaction') }}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="offset-md-4 col-md-6">

						<button class="btn btn-success float-end">Enroll Now</button>

					</div>
				</div>
			</div>
		</form>
		@endauth

	</div>

	<!-- Jquery Core Js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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