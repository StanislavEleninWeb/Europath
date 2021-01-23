@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col pt-3">
			Roles:
			@foreach($user->roles as $itr)
			{{ $itr->name }}, 
			@endforeach
		</div>
		<div class="col pt-3">
			<form method="POST" action="{{ route('admin.user.role.store', $user->id) }}" class="form mt-3">
				@csrf

				@include('components.form-errors')

				<div class="mb-3">
					<label>Roles:</label>
					<select name="role_id" class="w-full">
						<option></option>
						@foreach($roles as $itr)
						<option value="{{ $itr->id }}">{{ $itr->name }}</option>
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