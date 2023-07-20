@extends('layouts.backend.app')

@section('title', 'Course')

@section('main_content')

<!-- Main content -->
<div class="row">
	<div class="col-12">

		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h3 class="card-title">ALL USER <span class="badge badge-danger">{{ $users->count() }}</span></h3>
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
							<th>Create_at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email</th>
							<th>Create_at</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						@foreach ($users as $key => $user)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at->format('d-M-Y') }} at {{ $user->created_at->format('h:i:A') }}</td>
							<td>
								<a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-sm btn-danger" id="delete"
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