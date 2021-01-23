@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Phone</th>
				</thead>
				@foreach($phones as $itr)
				<tr>
					<td>{{ $itr->id }}</td>
					<td>{{ $itr->phone }}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection