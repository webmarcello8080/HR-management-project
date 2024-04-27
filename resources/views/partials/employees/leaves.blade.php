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