<!-- Session Status -->
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>

<!-- Validation Errors -->
@if ($errors->any())
    <div class="mb-5">
        <div class="font-medium error">
            {{ __('Whoops! Something went wrong.') }}
        </div>
        <ul class="text-sm error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif