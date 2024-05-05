<div class="table-row border-b border-b-gray/20 ">
    @if($display_user)
        <span class="table-cell align-middle py-2 pl-3">
            @if ($attendance->employee)
                @include('partials.employees.employee-budge', ['employee' => $attendance->employee])
            @endif
        </span>
    @endif
    <span class="table-cell align-middle py-2">{{ $attendance->date->format('F d, Y') }}</span>
    <span class="table-cell align-middle py-2">{{ $attendance->start_time->format('H:i') }}</span>
    <span class="table-cell align-middle py-2">{{ $attendance->finish_time->format('H:i') }}</span>
    <span class="table-cell align-middle py-2">{{ $attendance->working_hours }}</span>
    <span class="table-cell align-middle py-2"><span class="budge budge-purple">{{ $attendance?->employeeType->name }}</span></span>
    @can('admin')
        <span class="table-cell align-middle py-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('attendance.edit', $attendance) }}">@svg('edit', 'w-6 h-6')</a>
                <a class="cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this attendance?'>@svg('trash', 'w-6 h-6')</a>
            </div>
        </span>
    @endcan
</div>