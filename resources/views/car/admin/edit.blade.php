@extends('layouts.admin')

@section('script')
@parent

<!-- Home js -->
<script src="{{ mix('js/car.js') }}" defer></script>

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.car.update', $car->id) }}" class="form mt-3">
				@csrf
				@method('PATCH')

				@include('components.form-errors')

				<div class="mb-3">
					<label class="form-label">Office:</label>
					<select id="office" name="office_id" class="form-control" required>
						<option></option>
						@foreach($offices as $itr)
						<option value="{{ $itr->id }}" @if($itr->id == $car->office_id) selected @endif>{{ $itr->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Courier:</label>
					<select id="courier" name="courier_id" class="form-control">
						<option></option>
						@foreach($couriers as $itr)
						<option value="{{ $itr->id }}" @if( isset($car->courier[0]->id) && $itr->id == $car->courier[0]->id) selected @endif>{{ $itr->user->first_name }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Brand:</label>
					<input type="text" name="brand" value="{{ $car->brand }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Model:</label>
					<input type="text" name="model" value="{{ $car->model }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Registration:</label>
					<input type="text" name="registration" value="{{ $car->registration }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Fuel:</label>
					<input type="text" name="fuel" value="{{ $car->fuel }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Fuel consumpion:</label>
					<input type="number" name="fuel_consumption" value="{{ $car->fuel_consumption }}" step="0.01" class="form-control" required>
				</div>

				<div>
					<input type="submit" value="Save" class="btn btn-primary">
					<a href="{{ route('admin.car.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection