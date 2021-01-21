@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.province.update', $province->id) }}" class="form mt-3">
				@csrf
				@method('PATCH')

				@include('components.form-errors')

				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="name" value="{{ $province->name }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label>Name en:</label>
					<input type="text" name="name_en" value="{{ $province->name_en }}" class="form-control" required>
				</div>

				<div>
				<input type="submit" value="Save" class="btn btn-primary">
					<a href="{{ route('admin.province.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection