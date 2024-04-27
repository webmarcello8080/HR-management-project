@section('page-title', 'Employee Information')
@section('page-subtitle', 'All Employees > ' . $employee->getFullName() . ' Information')
<div class="rounded-container">
    @include('partials\employees\top-section')
    <div class="flex items-start gap-8">
        <div class="rounded-xl border border-gray/20 basis-[275px] grow-0 shrink-0 overflow-hidden">
            <div wire:click='setMenuTab(1)' class="menu-tabs @if($menuTab == 1) active @endif">@svg('user', 'w-6 h-6') <span>Profile</span></div>
            <div wire:click='setMenuTab(2)' class="menu-tabs @if($menuTab == 2) active @endif">@svg('calendar', 'w-6 h-6') <span>Attendance</span></div>
            {{-- <div wire:click='setMenuTab(3)' class="menu-tabs @if($menuTab == 3) active @endif">@svg('file', 'w-6 h-6') <span>Projects</span></div> --}}
            <div wire:click='setMenuTab(4)' class="menu-tabs @if($menuTab == 4) active @endif">@svg('notepad', 'w-6 h-6') <span>Leave</span></div>
        </div>
        <div class="grow">
            @if ($menuTab == 1)
                @livewire('employees.show.information', ['employee' => $employee])
            @endif
            @if ($menuTab == 2)
                <h4>something in here 2</h4>
            @endif
            @if ($menuTab == 3)
                <h4>something in here 3</h4>
            @endif
            @if ($menuTab == 4)
                @if ($employee->leaves)
                    <div class="table w-full border-collapse">
                        <div class="table-row border-b border-gray/20">
                            <span class="caption table-cell py-2">From Date</span>
                            <span class="caption table-cell py-2">To Date</span>
                            <span class="caption table-cell py-2">Days</span>
                            <span class="caption table-cell py-2">Status</span>
                            @can('admin')
                                <span class="caption table-cell py-2">Actions</span>
                            @endcan
                        </div>
                        @foreach ($employee->leaves as $leave)
                            @livewire('leaves.line-leave', ['leave' => $leave, 'display_user' => false], key($leave->id))
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
