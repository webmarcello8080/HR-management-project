<div class="gray-container basis-72 grow-0 shrink-0">
    <h2 class="mb-8">LogoHere</h2>
    <nav class="main-menu">
        <a href="{{ route('employee.index' )}}" class="menu-item {{ request()->routeIs('employee.*') ? 'active' : '' }}">
            @svg('group', 'w-6 h-6')<span>All Employees</span>
        </a>
        <a href="{{ route('department.index' )}}" class="menu-item {{ request()->routeIs('department.*') ? 'active' : '' }}">
            @svg('community', 'w-6 h-6')<span>Deparments</span>
        </a>
        <a href="{{ route('vacancy.index' )}}" class="menu-item {{ request()->routeIs('vacancy.*') ? 'active' : '' }}">
            @svg('briefcase', 'w-6 h-6')<span>Vacancies</span>
        </a>
        <a href="{{ route('candidate.index' )}}" class="menu-item {{ request()->routeIs('candidate.*') ? 'active' : '' }}">
            @svg('candidate', 'w-6 h-6')<span>Candidates</span>
        </a>
        <a href="{{ route('holiday.index' )}}" class="menu-item {{ request()->routeIs('holiday.*') ? 'active' : '' }}">
            @svg('note', 'w-6 h-6')<span>Holidays</span>
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