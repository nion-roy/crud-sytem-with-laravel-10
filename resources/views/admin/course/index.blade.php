@extends('layouts.backend.app')

@section('title', 'Course')

@section('main_content')

<!-- Main content -->
<div class="row">
	<div class="col-12">

		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h3 class="card-title">ALL COURSE <span class="badge badge-danger">{{ $courses->count() }}</span></h3>
					<a href="{{ route('admin.course.create') }}" class="btn btn-danger">
						<i class="fas fa-plus"></i>
						<span>Add New Course</span>
					</a>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>SL</th>
							<th>Course</th>
							<th>Slug</th>
							<th>Sit</th>
							<th>Image</th>
							<th>Created</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>SL</th>
							<th>Course</th>
							<th>Slug</th>
							<th>Sit</th>
							<th>Image</th>
							<th>Created</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						@foreach ($courses as $key => $course)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ Str::limit($course->name, 12, '...') }}</td>
							<td>{{ $course->slug }}</td>
							<td>{{ $course->sit }}</td>
							<td>
								<img src="{{ Storage::disk('public')->url('course/'. $course->image ) }}" class="img-thumbnail"
									style="width: 60px; height: 60px;" alt="{{ $course->name }}">
							</td>
							<td>{{ $course->created_at->format('d-M-Y') }} at {{ $course->created_at->format('h:i:A') }}</td>
							<td>
								<a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-sm btn-success"
									data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
								<a href="{{ route('admin.delete', $course->id) }}" class="btn btn-sm btn-danger" id="delete"
									data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- #END# Exportable Table -->

@endsection