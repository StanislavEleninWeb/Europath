@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.office.store') }}" class="form mt-3">
				@csrf

				@include('components.form-errors')

				<div class="mb-3">
					<label class="form-label">Manger:</label>
					<small class="text-secondary">* Show users with role manager</small>
					<select name="manager_id" class="form-control" required>
						<option></option>
						@foreach($managers as $itr)
						<option value="{{ $itr->id }}">{{ $itr->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Cities:</label>
					<select name="cities[]" class="form-control" multiple>
						<option></option>
						@foreach($provinces as $province)
						<optgroup label="{{ $province->name }}">
							@foreach($province->regions as $region)
							<optgroup label="{{ $region->name }}">
								@foreach($region->cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</optgroup>
							@endforeach
						</optgroup>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="name" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Address:</label>
					<input type="text" name="address" class="form-control" required>
				</div>
				<div class="mb-3">
					<label>Opening hours:</label>
					<textarea name="opening_hours" class="form-control" required></textarea>
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

@section('script')
@parent

<!-- Home js -->
<script src="{{ mix('js/home.js') }}" defer></script>

@endsection