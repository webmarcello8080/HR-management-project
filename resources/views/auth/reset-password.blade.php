@extends('layouts.auth')
@section('content')
	<div class="min-h-screen flex flex-col sm:justify-center items-center">
		<div class="w-full sm:max-w-[500px] p-6">
			@include('auth.partials.validate-errors')

			<h4 class="mb-2">Reset Password</h4>
			<div class="caption mb-5">
				{{ __('Forgot your password? No problem. Insert your email address and new password.') }}
			</div>

			<form method="POST" action="{{ route('password.update') }}">
				@csrf
				<!-- Password Reset Token -->
				<input type="hidden" name="token" value="{{ $request->route('token') }}">

				<input id="email" name="email" type="email" class="input-element mb-5" value="{{ old('email', $request->email) }}" placeholder="Insert email address" required autofocus>

				<input id="password" name="password" type="password" class="input-element mb-5" placeholder="Insert password" required>

				<input id="password_confirmation" name="password_confirmation" type="password" class="input-element mb-5" placeholder="Confirm password" required>

				<button type="submit" class="btn btn-big btn-purple w-full">
					{{ __('Reset Password') }}
				</button>
			</form>
		</div>
	</div>
@endsection