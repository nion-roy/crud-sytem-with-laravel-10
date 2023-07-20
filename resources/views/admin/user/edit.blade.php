@extends('layouts.backend.app')

@section('title', 'Course Edit')

@section('main_content')


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">EDIT COURSE</h3>
	</div>
	<!-- form start -->
	<form action="{{ route('admin.course.update', $course->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="card-body">
			<div class="form-group">
				<label for="name">Course Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Enter Course Name"
					value="{{ $course->name }}">
			</div>
			<div class="form-group">
				<label for="sit">Total Set</label>
				<input type="number" class="form-control" name="sit" id="sit" placeholder="Enter Course Sit"
					value="{{ $course->sit }}">
			</div>
			<div class="form-group">
				<label for="desciptions">Desciptions</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="4"
					placeholder="Enter Course Description">{{ $course->description }}</textarea>
			</div>
			<div class="form-group">
				<label class="form-label" for="image">Image</label><br>
				<img src="{{ Storage::disk('public')->url('course/'. $course->image) }}" class="img-thumbnail"
					style="width: 120px; height: 120px;" alt="{{ $course->name }}">
				<input type="file" class="form-control mt-3" name="image" id="image">
			</div>
			<a href="{{ route('admin.course.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-success">Update Now</button>
		</div>

	</form>
</div>



@endsection