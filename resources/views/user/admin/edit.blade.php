@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.user.update', $user->id) }}" class="form mt-3">
				@csrf
				@method('PATCH')

				@include('components.form-errors')

				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="middle_name" value="{{ $user->middle_name }}" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Name:</label>
					<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Email:</label>
					<input type="text" name="name" value="{{ $user->email }}" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Roles:</label>
					<select name="province_id" class="form-control" required>
						<option></option>
						@foreach($roles as $itr)
						<option value="{{ $itr->id }}">{{ $itr->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Phones:</label>
					<select name="province_id" class="form-control" required>
						<option></option>
						@foreach($user->phones as $itr)
						<option value="{{ $itr->id }}" >{{ $itr->phone }}</option>
						@endforeach
					</select>
				</div>


				<div>
				<input type="submit" value="Save" class="btn btn-primary">
					<a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection