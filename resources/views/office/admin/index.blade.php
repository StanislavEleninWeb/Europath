@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Manager</th>
					<th>Address</th>
					<th>Opening hours</th>
					<th>
						<a href="{{ route('admin.office.create') }}" class="btn btn-sm btn-success"><i class="bi bi-file-plus"></i> add</a>
					</th>
				</thead>
				@foreach($offices as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->name }}</td>
					<td>{{ $itr->manager->name }}</td>
					<td>{{ $itr->address }}</td>
					<td>{{ $itr->opening_hours }}</td>
					<td>
						<a href="{{ route('admin.office.edit', $itr->id) }}" class="btn btn-sm btn-warning">Edit</a>
						<form action="{{ route('admin.office.destroy', $itr->id) }}" method="POST">
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