@extends('layouts.auth')
@section('content')
	<div class="h-full flex flex-col sm:justify-center items-center">
		<div class="w-full sm:max-w-[500px] p-6">
			<div class="mb-5">
				<a href="{{ route('login') }}">< Back</a>
			</div>

			<h4 class="mb-2">Forgot Password</h4>
			<div class="caption mb-5">
				{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
			</div>

			@include('partials\messages\validate-errors')

			<form method="POST" action="{{ route('password.email') }}">
				@csrf
				<input id="email" name="email" type="email" class="input-element mb-5" placeholder="Insert email address" value="{{ old('email') }}" required autofocus>

				<button type="submit" class="btn btn-big btn-purple w-full">
					{{ __('Email Password Reset Link') }}
				</button>
			</form>
		</div>
	</div>
@endsection