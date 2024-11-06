<div class="flex items-center gap-4">
    <div class="w-10 h-10 rounded-full overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ $employee->getProfileUrl() }}">
    </div>
    <div>
        <div class="font-semibold">{{ $employee->getFullName() }}</div>
        <div class="caption">{{ $employee->employeeInformation?->designation }}</div>
    </div>
</div>