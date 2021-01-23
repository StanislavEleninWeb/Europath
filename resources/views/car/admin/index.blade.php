@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Registration</th>
					<th>
						<a href="{{ route('admin.car.create') }}" class="btn btn-sm btn-success"><i class="bi bi-file-plus"></i> add</a>
					</th>
				</thead>
				@foreach($cars as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->brand }}</td>
					<td>{{ $itr->model }}</td>
					<td>{{ $itr->registration }}</td>
					<td>
						<a href="{{ route('admin.car.edit', $itr->id) }}" class="btn btn-sm btn-warning">Edit</a>
						<form action="{{ route('admin.car.destroy', $itr->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<input type="submit" class="btn btn-sm btn-danger" value="Delete">
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection