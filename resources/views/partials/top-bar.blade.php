<div class="flex items-center justify-between mb-11">
    <div>
        <h6 class="mb-0">@yield('page-title')</h6>
        <div class="small-caption">@yield('page-subtitle')</div>
    </div>
    <div class="flex items-center gap-5">
        <div class="grey-container !p-3">@svg('notification', 'w-6 h-6')</div>
        @livewire('partials.user-budge', key('user-budge'))
    </div>
</div>