<div class="table-row border-b border-b-gray/20 ">
    @can('admin')
        <span class="table-cell align-middle py-3 pl-3">
            @if ($leave->employee)
                @include('partials.employees.employee-budge', ['employee' => $leave->employee])
            @endif
        </span>
    @endcan
    <span class="table-cell align-middle py-3">{{ $leave->from_date->format('F d, Y') }}</span>
    <span class="table-cell align-middle py-3">{{ $leave->to_date->format('F d, Y') }}</span>
    <span class="table-cell align-middle py-3">{{ $leave->days }}</span>
    <span class="table-cell align-middle py-3">
        <div class="budge budge-{{ $statusColours[$leave->leave_status->value - 1] }}">{{ $leave->leave_status->name }}</div>
    </span>
    @can('admin')
        <span class="table-cell align-middle py-3">
            <div class="flex items-center gap-2">
                <a href="{{ route('leave.edit', $leave) }}">@svg('edit', 'w-6 h-6')</a>
                <a class="cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this leave?'>@svg('trash', 'w-6 h-6')</a>
            </div>
        </span>
    @endcan
</div>