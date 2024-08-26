@section('page-title', 'Employee Information')
@section('page-subtitle', 'All Employees > ' . $employee->getFullName() . ' Information')
<div class="rounded-container">
    @include('partials\employees\top-section')
    <div class="flex items-start gap-8">
        <div class="rounded-xl border border-grey/20 basis-[275px] grow-0 shrink-0 overflow-hidden">
            <div wire:click='setMenuTab(1)' class="menu-tabs @if($menuTab == 1) active @endif">@svg('user', 'w-6 h-6') <span>Profile</span></div>
            <div wire:click='setMenuTab(2)' class="menu-tabs @if($menuTab == 2) active @endif">@svg('calendar', 'w-6 h-6') <span>Attendance</span></div>
            {{-- <div wire:click='setMenuTab(3)' class="menu-tabs @if($menuTab == 3) active @endif">@svg('file', 'w-6 h-6') <span>Projects</span></div> --}}
            <div wire:click='setMenuTab(4)' class="menu-tabs @if($menuTab == 4) active @endif">@svg('notepad', 'w-6 h-6') <span>Leave</span></div>
        </div>
        <div class="grow">
            @if ($menuTab == 1)
                @livewire('employees.show.information', ['employee' => $employee], key('employee-' . $employee->id))
            @endif
            @if ($menuTab == 2)
                @include('partials.attendances.table', ['attendances' => $employee->attendances, 'display_user' => false])
            @endif
            @if ($menuTab == 3)
                <h4>something in here 3</h4>
            @endif
            @if ($menuTab == 4)
                @include('partials.leaves.table', ['leaves' => $employee->leaves, 'display_user' => false])
            @endif
        </div>
    </div>
</div>
