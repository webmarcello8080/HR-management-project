<div id="top-bar" class=" mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h6 class="mb-0">@yield('page-title')</h6>
            <div class="small-caption">@yield('page-subtitle')</div>
        </div>
        <div class="flex items-center gap-5">
            <div class="grey-container !p-3">@svg('notification', 'w-6 h-6')</div>
            @livewire('partials.user-budge', key('user-budge'))
        </div>
    </div>
    <div class="my-6">
        @include('partials\messages\flash-messages')
    </div>
</div>