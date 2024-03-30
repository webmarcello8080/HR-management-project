<div class="table-row border-b border-gray/20">
    <span class="table-cell align-middle py-2">
        @include('partials\employees\employee-budge')
    </span>
    <span class="table-cell align-middle py-2">{{ $employee->employeeInformation?->unique_id }}</span>
    <span class="table-cell align-middle py-2">{{ $employee->employeeInformation?->department?->name }}</span>
    <span class="table-cell align-middle py-2">{{ $employee->employeeInformation?->employeeType?->name }}</span>
    <span class="table-cell align-middle py-2">
        <span class="budge budge-purple">{{ $employee->employeeInformation?->working_day?->name }}</span>
    </span>
    <span class="table-cell align-middle py-2">{{ $employee->employeeInformation?->location?->name }}</span>
    <span class="table-cell align-middle py-2">
        <div class="flex items-center gap-2">
            <a href="{{ route('employee.show', $employee)}}">@svg('eye', 'w-6 h-6')</a>
            <a href="{{ route('employee.edit', $employee) }}">@svg('edit', 'w-6 h-6')</a>
            @svg('trash', 'w-6 h-6')    
        </div>
    </span>
</div>
