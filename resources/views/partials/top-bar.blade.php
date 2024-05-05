<div class="flex items-center justify-between mb-11">
    <div>
        <h6 class="mb-0">@yield('page-title')</h6>
        <div class="small-caption">@yield('page-subtitle')</div>
    </div>
    @livewire('partials.user-budge', key('top-bar'))
</div>