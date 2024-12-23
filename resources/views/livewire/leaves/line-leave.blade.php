<div class="table-row border-b border-b-grey/20 ">
    @if($display_user)
        <span class="table-cell align-middle py-2 pl-3">
            @if ($leave->employee)
                @include('partials.employees.employee-badge', ['employee' => $leave->employee])
            @endif
        </span>
    @endif
    <span class="table-cell align-middle py-2">{{ $leave->from_date->format($setting_date_format) }}</span>
    <span class="table-cell align-middle py-2">{{ $leave->to_date->format($setting_date_format) }}</span>
    <span class="table-cell align-middle py-2">{{ $leave->days }}</span>
    <span class="table-cell align-middle py-2">
        <div class="badge badge-{{ $leave->leave_status->colour() }}">{{ $leave->leave_status->label() }}</div>
    </span>
    @can('admin')
        <span class="table-cell align-middle py-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('leave.edit', $leave) }}">@svg('edit', 'w-6 h-6')</a>
                <a class="cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this leave?'>@svg('trash', 'w-6 h-6')</a>
            </div>
        </span>
    @endcan
</div>