<div class="gray-container basis-72 grow-0 shrink-0">
    <h2 class="mb-8">LogoHere</h2>
    <nav class="main-menu">
        <a href="{{ route('employee.index' )}}" class="menu-item {{ request()->routeIs('employee.*') ? 'active' : '' }}">
            @svg('group', 'w-6 h-6')<span>All Employees</span>
        </a>
        <a href="{{ route('components' )}}" class="menu-item {{ request()->routeIs('components') ? 'active' : '' }}">
            @svg('eye', 'w-6 h-6')<span>Components</span>
        </a>
    </nav>
    
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>