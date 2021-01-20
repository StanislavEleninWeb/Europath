@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>
						<a href="{{ route('admin.province.create') }}" class="btn btn-sm btn-success"><i class="bi bi-file-plus"></i> add</a>
					</th>
				</thead>
				@foreach($provinces as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->name }}</td>
					<td>
						<a href="{{ route('admin.province.edit', $itr->id) }}" class="btn btn-sm btn-warning">Edit</a>
						<form action="{{ route('admin.province.destroy', $itr->id) }}" method="POST">
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