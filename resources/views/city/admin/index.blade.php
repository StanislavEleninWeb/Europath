@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Post code</th>
					<th>Region</th>
					<th>Name</th>
					<th>
						<a href="{{ route('admin.city.create') }}" class="btn btn-sm btn-success"><i class="bi bi-file-plus"></i> add</a>
					</th>
				</thead>
				@foreach($cities as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->post_code }}</td>
					<td>{{ $itr->region->name }}</td>
					<td>{{ $itr->name }}</td>
					<td>
						<a href="{{ route('admin.city.edit', $itr->id) }}" class="btn btn-sm btn-warning">Edit</a>
						<form action="{{ route('admin.city.destroy', $itr->id) }}" method="POST">
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