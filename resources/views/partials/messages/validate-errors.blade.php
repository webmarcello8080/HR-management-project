<!-- Session Status -->
<div class="my-4">
    @include('partials\messages\flash-messages')
</div>

<!-- Validation Errors -->
@if ($errors->any())
    <div class="bg-red/10 border-t-4 border-red rounded-b p-4 shadow-md my-4" role="alert">
        <div class="flex items-center gap-4">
            <div class="text-red">
                @svg('warning', 'w-6 h-6')
            </div>
            <div>
                <div class="font-semibold error">
                    {{ __('Whoops! Something went wrong.') }}
                </div>
                <ul class="error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif