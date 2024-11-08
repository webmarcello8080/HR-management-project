<div class="table-row border-b border-b-grey/20 ">
    @if($display_user)
        <span class="table-cell align-middle py-2 pl-3">
            @if ($payroll->employee)
                @include('partials.employees.employee-badge', ['employee' => $payroll->employee])
            @endif
        </span>
    @endif
    <span class="table-cell align-middle py-2">{{ $payroll->payroll_date->format('F d, Y') }}</span>
    <span class="table-cell align-middle py-2">{{ $payroll->annual_salary }}</span>
    <span class="table-cell align-middle py-2">{{ $payroll->gross_pay }}</span>
    <span class="table-cell align-middle py-2">{{ $payroll->net_pay }}</span>
    @can('admin')
        <span class="table-cell align-middle py-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('payroll.edit', $payroll) }}">@svg('edit', 'w-6 h-6')</a>
                <a class="cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this payroll?'>@svg('trash', 'w-6 h-6')</a>
            </div>
        </span>
    @endcan
</div>