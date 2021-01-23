@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			Couriers:<br>
			@foreach($office->couriers as $itr)
			{{ $itr->uuid }}, {{ $itr->user->name }} <br>
			@endforeach
		</div>
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.office.courier.store', $office->id) }}" class="form mt-3">
				@csrf

				@include('components.form-errors')

				<div class="mb-3">
					<label>Courier:</label>
					<select name="courier_id">
						<option></option>
						@foreach($couriers as $itr)
						<option value="{{ $itr->id }}">{{ $itr->user->name }}</option>
						@endforeach
					</select>
				</div>

				<div>
					<input type="submit" value="Save" class="btn btn-primary">
					<a href="{{ route('admin.office.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection