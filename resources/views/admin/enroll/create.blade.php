@extends('layouts.backend.app')

@section('title', 'Course Enroll')

@section('main_content')


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">ADD NEW ENROLLER</h3>
	</div>
	<!-- form start -->
	<form action="{{ route('admin.enroll.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name"
					value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
					value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<label for="course">Selected Course</label>
				<select name="course_id" id="course" class="form-control">
					<option value="">--select--</option>
					@foreach ($courses as $course)
					<option value="{{ $course->id }}">{{ $course->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="number" class="form-control" name="contact" id="contact" min="0" placeholder="Enter Contact Number"
					value="{{ old('contact') }}">
			</div>
			<div class="form-group">
				<label for="payment">Payment</label>
				<select name="payment" id="payment" class="form-control">
					<option value="">--select--</option>
					<option value="Bkash">Bkash</option>
					<option value="Nagad">Nagad</option>
				</select>
			</div>
			<div class="form-group">
				<label for="transaction">Transaction</label>
				<input type="text" class="form-control" name="transaction" id="transaction"
					placeholder="Enter Transaction Number" value="{{ old('transaction') }}">
			</div>

			<a href="{{ route('admin.enroll.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-success">Add Now</button>
		</div>

	</form>
</div>



@endsection