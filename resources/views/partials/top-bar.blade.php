<div class="flex items-center justify-between mb-11">
    <div>
        <h6 class="mb-0">@yield('page-title')</h6>
        <div class="small-caption">@yield('page-subtitle')</div>
    </div>
    <div class="flex items-center gap-5">
        <div class="gray-container !p-3">@svg('notification', 'w-6 h-6')</div>
        <div class="rounded-container !p-2 flex items-center gap-2 cursor-pointer">
            @if (auth()->user()->employee)
                @include('partials.employees.employee-budge', ['employee' => auth()->user()->employee ])
            @endif
            @svg('arrow-down', 'w-6 h-6')
        </div>
    </div>
</div>