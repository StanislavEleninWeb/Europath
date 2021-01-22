@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>UUID</th>
					<th>Name</th>
					<th>Office</th>
					<th>
						<a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-success"><i class="bi bi-file-plus"></i> add</a>
					</th>
				</thead>
				@foreach($couriers as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->uuid }}</td>
					<td>{{ $itr->user->name }}</td>
					<td>{{ $itr->office->name }}</td>
					<td>
						<a href="{{ route('admin.courier.show', $itr->id) }}" class="btn btn-sm btn-info">Show</a>
						<form action="{{ route('admin.courier.destroy', $itr->id) }}" method="POST">
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