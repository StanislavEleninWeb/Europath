@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.region.update', $region->id) }}" class="form mt-3">
				@csrf
				@method('PATCH')

				@include('components.form-errors')

				<div class="mb-3">
					<label class="form-label">Province:</label>
					<select name="province_id" class="form-control" required>
						<option></option>
						@foreach($provinces as $itr)
						<option value="{{ $itr->id }}" @if($itr->id == $region->province_id) selected @endif>{{ $itr->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="name" value="{{ $region->name }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Name en:</label>
					<input type="text" name="name_en" value="{{ $region->name_en }}" class="form-control" required>
				</div>

				<div>
				<input type="submit" value="Save" class="btn btn-primary">
					<a href="{{ route('admin.region.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection