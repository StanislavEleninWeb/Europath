@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Roles</th>
					<th></th>
				</thead>
				@foreach($users as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->name }}</td>
					<td>
						@foreach($itr->roles as $jtr)
						{{ $jtr->name }}<br>
						@endforeach
					</td>
					<td>
						<a href="{{ route('admin.user.edit', $itr->id) }}" class="btn btn-sm btn-warning">Edit</a>
						<form action="{{ route('admin.user.destroy', $itr->id) }}" method="POST">
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