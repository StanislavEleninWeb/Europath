@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Registration</th>
					<th>Taken</th>
					<th>Released</th>
				</thead>
				@foreach($report as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->name }}</td>
					<td>{{ $itr->registration }}</td>
					<td>{{ $itr->created_at }}</td>
					<td>{{ $itr->deleted_at }}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection