@extends('layouts.auth')
@section('title', 'Login')
@section('content')
	<div class="h-full flex flex-col sm:justify-center items-center">
		<div class="w-full sm:max-w-[500px] p-6">
			<h2 class="mb-9">LogoHere</h2>
			<div class="mb-5">
				<h4 class="mb-0">Welcome</h4>
				<div class="caption">Please login here</div>
			</div>

			@include('partials\validate-errors')

			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div class="mb-5">
					<input id="email" name="email" type="email" class="input-element mb-5" value="{{ old('email') }}" placeholder="Email address" required autofocus>
					<input id="password" name="password" type="password" class="input-element" placeholder="Password" required autocomplete="current-password">	
				</div>

				<!-- Remember Me -->
				<div class="flex justify-between mb-7">
					<label for="remember_me" class="inline-flex items-center">
						<input id="remember_me" type="checkbox" class="input-checkbox" name="remember">
						<span class="ml-2">{{ __('Remember me') }}</span>
					</label>
					@if (Route::has('password.request'))
						<a class="underline text-purple" href="{{ route('password.request') }}">
							{{ __('Forgot your password?') }}
						</a>
					@endif
				</div>

				<div class="flex items-center justify-end mt-4">
					<button type="submit" class="btn btn-big btn-purple w-full">
						{{ __('Log in') }}
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection