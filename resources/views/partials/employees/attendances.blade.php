<div class="table w-full border-collapse">
    <div class="table-row border-b border-gray/20">
        <span class="caption table-cell py-2">Date</span>
        <span class="caption table-cell py-2">From</span>
        <span class="caption table-cell py-2">To</span>
        <span class="caption table-cell py-2">Working Hours</span>
        <span class="caption table-cell py-2">Type</span>
        @can('admin')
            <span class="caption table-cell py-2">Actions</span>
        @endcan
    </div>
    @if (count($employee->attendances))
        @foreach ($employee->attendances as $attendance)
            @livewire('attendances.line-attendance', ['attendance' => $attendance, 'display_user' => false], key($attendance->id))
        @endforeach
    @else
        <h6 class="my-5 caption">No attendance found</h6>
    @endif
</div>