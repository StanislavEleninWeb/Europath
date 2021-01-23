@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
				<div class="mb-3">
					<label class="form-label">ID:</label>
					<b>{{ $courier->id }}</b>
				</div>

				<div class="mb-3">
					<label class="form-label">UUID:</label>
					<b>{{ $courier->uuid }}</b>
				</div>

				<div class="mb-3">
					<label class="form-label">Name:</label>
					<b>{{ $courier->user->name }}</b>
				</div>

				<div class="mb-3">
					<label class="form-label">Email:</label>
					<b>{{ $courier->user->email }}</b>
				</div>

				<div class="mb-3">
					<label>Office</label>
					<b>{{ $courier->office->name }}, {{ $courier->office->address }}</b>
				</div>

				@if(isset($courier->phones) && count($courier->phones))
				<div class="mb-3">
					<label class="form-label">Phones:</label>
					@foreach($courier->phones as $phone)
					<b>{{ $phone->phone }}</b>,
					@endforeach
				</div>
				@endif

				@if(isset($courier->car) && count($courier->car))
				<div class="mb-3">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Brand</th>
								<th>Model</th>
								<th>Reg</th>
								<th>Fuel</th>
								<th>Consumption</th>
							</tr>
						</thead>
						<tbody>
							@foreach($courier->car as $car)
							<tr>
								<td>{{ $car->brand }}</td>
								<td>{{ $car->model }}</td>
								<td>{{ $car->registration }}</td>
								<td>{{ $car->fuel }}</td>
								<td>{{ $car->fuel_consumption }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@endif

				<div class="mb-3">
					<a href="{{ route('admin.courier.phone', $courier->id) }}" class="btn btn-sm btn-info">Phones</a>
				</div>


				<div>
					<a href="{{ route('admin.courier.index') }}" class="btn btn-secondary">Back</a>
				</div>
		</div>
	</div>
</div>
@endsection