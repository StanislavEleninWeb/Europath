@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			Phones:
			@foreach($office->phones as $itr)
			{{ $itr->phone }}, 
			@endforeach
		</div>
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.office.phone.store', $office->id) }}" class="form mt-3">
				@csrf

				@include('components.form-errors')

				<div class="mb-3">
					<label>Phone:</label>
					<input type="text" name="phone" class="form-control" required>
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