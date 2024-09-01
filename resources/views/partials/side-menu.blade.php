<div class="grey-container min-h-[calc(100vh-40px)] sticky top-5 basis-72 grow-0 shrink-0">
    <h2 class="mb-8"><a class="no-underline" href="{{ route('home') }}">LogoHere</a></h2>
    {{-- Admin main menu --}}
    @can('admin')
        <nav class="main-menu">
            <a href="{{ route('employee.index' )}}" class="menu-item {{ request()->routeIs('employee.*') ? 'active' : '' }}">
                @svg('group', 'w-6 h-6')<span>All Employees</span>
            </a>
            <a href="{{ route('department.index' )}}" class="menu-item {{ request()->routeIs('department.*') ? 'active' : '' }}">
                @svg('community', 'w-6 h-6')<span>Deparments</span>
            </a>
            <a href="{{ route('attendance.index' )}}" class="menu-item {{ request()->routeIs('attendance.*') ? 'active' : '' }}">
                @svg('calendar', 'w-6 h-6')<span>Attendances</span>
            </a>
            <a href="{{ route('payroll.index' )}}" class="menu-item {{ request()->routeIs('payroll.*') ? 'active' : '' }}">
                @svg('dollar', 'w-6 h-6')<span>Payrolls</span>
            </a>
            <a href="{{ route('vacancy.index' )}}" class="menu-item {{ request()->routeIs('vacancy.*') ? 'active' : '' }}">
                @svg('briefcase', 'w-6 h-6')<span>Vacancies</span>
            </a>
            <a href="{{ route('candidate.index' )}}" class="menu-item {{ request()->routeIs('candidate.*') ? 'active' : '' }}">
                @svg('candidate', 'w-6 h-6')<span>Candidates</span>
            </a>
            <a href="{{ route('leave.index' )}}" class="menu-item {{ request()->routeIs('leave.*') ? 'active' : '' }}">
                @svg('notepad', 'w-6 h-6')<span>Leaves</span>
            </a>
            <a href="{{ route('holiday.index' )}}" class="menu-item {{ request()->routeIs('holiday.*') ? 'active' : '' }}">
                @svg('note', 'w-6 h-6')<span>Holidays</span>
            </a>
        </nav>
    @endcan
    {{-- Employee main menu --}}
    @can('employee')
        <nav class="main-menu">
            <a href="{{ route('attendance.create' )}}" class="menu-item {{ request()->routeIs('attendance.*') ? 'active' : '' }}">
                @svg('calendar', 'w-6 h-6')<span>New Attendance</span>
            </a>
            <a href="{{ route('leave.create' )}}" class="menu-item {{ request()->routeIs('leave.*') ? 'active' : '' }}">
                @svg('notepad', 'w-6 h-6')<span>New Leave</span>
            </a>
        </nav>
    @endcan
</div>