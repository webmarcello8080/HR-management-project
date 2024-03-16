<div class="table-row border-b border-gray/20">
    <span class="table-cell py-2">
        <div class="flex items-center gap-4">
            <div class="w-9 h-9 rounded-full overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ $employee->getMediaUrl('profile_image') }}">
            </div>
            <div>{{ $employee->getFullName() }}</div>
        </div>
    </span>
    <span class="table-cell py-2">{{ $employee->employeeInformation?->unique_id }}</span>
    <span class="table-cell py-2">{{ $employee->employeeInformation?->department?->name }}</span>
    <span class="table-cell py-2">{{ $employee->employeeInformation?->designation }}</span>
    <span class="table-cell py-2">{{ $employee->employeeInformation?->employeeType?->name }}</span>
    <span class="table-cell py-2">
        <span class="budge budge-purple">{{ $employee->employeeInformation?->working_day?->name }}</span>
    </span>
    <span class="table-cell py-2">V 
        <a class="" href="{{ route('employee.edit', $employee->id) }}">E</a> D</span>
</div>
