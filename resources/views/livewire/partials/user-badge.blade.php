<div wire:click='toggleMenu' class="rounded-container !py-1 !px-3 relative flex items-center gap-2 cursor-pointer">
    @if (auth()->user()->employee)
        @include('partials.employees.employee-badge', ['employee' => auth()->user()->employee ])
    @else
        <div>{{ auth()->user()->name }}</div>
    @endif
    @svg('arrow-down', 'w-6 h-6')
    @if ($displayUserMenu)
        <div class="rounded-container !p-4 absolute bg-white w-full right-0 top-[56px]">
            @if (auth()->user()->employee)
                <a class="flex items-center gap-4 no-underline mb-4" href="{{ route('employee.show', auth()->user()->employee) }}">
                    @svg('user', 'w-6 h-6')<span>My Profile</span>
                </a>
            @endif
            <a class="text-red flex items-center gap-4 no-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                @svg('logout', 'w-6 h-6')Logout
            </a>
            <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    @endif
</div>

