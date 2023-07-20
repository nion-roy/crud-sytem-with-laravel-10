@extends('layouts.backend.app')

@section('title', 'Course')

@section('main_content')

<!-- Main content -->
<div class="row">
	<div class="col-12">

		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h3 class="card-title">ALL ENROLL <span class="badge badge-danger">{{ $enrolles->count() }}</span></h3>
					<a href="{{ route('admin.enroll.create') }}" class="btn btn-danger">
						<i class="fas fa-plus"></i>
						<span>Add New User Enroll</span>
					</a>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Course</th>
							<th>Payment</th>
							<th>Transaction</th>
							<th>Created</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Course</th>
							<th>Payment</th>
							<th>Transaction</th>
							<th>Created</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						@foreach ($enrolles as $key => $enroll)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $enroll->name }}</td>
							<td>{{ $enroll->email }}</td>
							<td>{{ $enroll->contact }}</td>
							<td>{{ $enroll->course->name }}</td>
							<td>{{ $enroll->payment }}</td>
							<td>{{ $enroll->transaction }}</td>

							<td>{{ $enroll->created_at->format('d-M-Y') }} at {{ $enroll->created_at->format('h:i:A') }}</td>
							<td>
								<a href="{{ route('admin.enroll.delete', $enroll->id) }}" class="btn btn-sm btn-danger" id="delete"
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