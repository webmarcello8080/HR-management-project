@extends('layouts.auth')
@section('page-title', 'Confirm Password')
@section('content')
	<div class="h-full flex flex-col sm:justify-center items-center">
		<div class="w-full sm:max-w-[500px] p-6">
			@include('partials\messages\validate-errors')

			<h4 class="mb-2">Comfirm Password</h4>
			<div class="caption mb-5">
				{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
			</div>

			<form method="POST" action="{{ route('password.confirm') }}">
				@csrf
				<input id="password" name="password" type="password" class="input-element mb-5" placeholder="Insert password" required autocomplete="current-password">

				<button type="submit" class="btn btn-big btn-purple w-full">
					{{ __('Confirm') }}
				</button>
			</form>
		</div>
	</div>
@endsection
