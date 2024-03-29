<div class="rounded-container">
    @include('partilas\employees\top-section')
    <div class="flex gap-8">
        <div class="rounded-xl border border-gray/20 basis-[275px] grow-0 shrink-0 overflow-hidden">
            <div wire:click='setMenuTab(1)' class="menu-tabs @if($menuTab == 1) active @endif">@svg('user', 'w-6 h-6') <span>Profile</span></div>
            <div wire:click='setMenuTab(2)' class="menu-tabs @if($menuTab == 2) active @endif">@svg('calendar', 'w-6 h-6') <span>Attendance</span></div>
            <div wire:click='setMenuTab(3)' class="menu-tabs @if($menuTab == 3) active @endif">@svg('file', 'w-6 h-6') <span>Projects</span></div>
            <div wire:click='setMenuTab(4)' class="menu-tabs @if($menuTab == 4) active @endif">@svg('notepad', 'w-6 h-6') <span>Leave</span></div>
        </div>
        <div class="grow">
            @if ($menuTab == 1)
                <h4>something in here 1</h4>
            @endif
            @if ($menuTab == 2)
                <h4>something in here 2</h4>
            @endif
            @if ($menuTab == 3)
                <h4>something in here 3</h4>
            @endif
            @if ($menuTab == 4)
                <h4>something in here 4</h4>
            @endif
        </div>
    </div>
</div>
