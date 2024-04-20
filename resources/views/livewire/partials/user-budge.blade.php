<div class="flex items-center gap-5">
    <div class="gray-container !p-3">@svg('notification', 'w-6 h-6')</div>
    <div wire:click='toggleMenu' class="rounded-container !p-2 relative flex items-center gap-2 cursor-pointer">
        @if (auth()->user()->employee)
            @include('partials.employees.employee-budge', ['employee' => auth()->user()->employee ])
        @else
            <div>{{ auth()->user()->name }}</div>
        @endif
        @svg('arrow-down', 'w-6 h-6')
        @if ($displayUserMenu)
            <div class="rounded-container !p-3 absolute bg-white w-full right-0 top-[63px]">
                @if (auth()->user()->employee)
                    <a class="flex items-center gap-4 no-underline mb-2" href="{{ route('employee.show', auth()->user()->employee) }}">
                        @svg('user', 'w-6 h-6')<span>My Profile</span>
                    </a>
                @endif
                <a class="flex items-center gap-4 no-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    @svg('logout', 'w-6 h-6')Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endif
    </div>
</div>

