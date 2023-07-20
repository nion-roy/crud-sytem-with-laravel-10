@extends('layouts.backend.app')

@section('title', 'Course Create')

@section('main_content')


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">ADD NEW COURSE</h3>
	</div>
	<!-- form start -->
	<form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Course Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Enter Course Name" value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label for="sit">Total Set</label>
				<input type="number" class="form-control" name="sit" id="sit" placeholder="Enter Course Sit" value="{{ old('sit') }}">
			</div>
			<div class="form-group">
				<label for="desciptions">Desciptions</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Enter Course Description"></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" class="form-control" name="image" id="image">
			</div>
			<a href="{{ route('admin.course.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-success" >Add Now</button>
		</div>

	</form>
</div>



@endsection