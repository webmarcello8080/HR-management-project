<div class="table w-full border-collapse">
    <div class="table-row border-b border-grey/20">
        @if ($display_user)
            <span class="caption table-cell py-2">Employee</span>
        @endif
        <span class="caption table-cell py-2">From Date</span>
        <span class="caption table-cell py-2">To Date</span>
        <span class="caption table-cell py-2">Days</span>
        <span class="caption table-cell py-2">Status</span>
        @can('admin')
            <span class="caption table-cell py-2">Actions</span>
        @endcan
    </div>
    @if (count($leaves))
        @foreach ($leaves as $leave)
            @livewire('leaves.line-leave', ['leave' => $leave, 'display_user' => $display_user], key('leave-' . $leave->id))
        @endforeach 
    @else
        <h6 class="my-5 caption">No leaves found</h6>
    @endif
</div>
