@if (session('status'))
    <div class="bg-teal/10 border-t-4 border-teal rounded-b p-4 shadow-md" role="alert">
        <div class="flex items-center gap-4">
            @svg('information', 'w-6 h-6')
            <p class="mb-0">{{ session('status') }}</p>
        </div>
    </div>
@endif