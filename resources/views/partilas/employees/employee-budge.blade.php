<a href="{{ route('employee.show', $employee->id)}}" class="flex items-center gap-4 no-underline cursor-pointer">
    <div class="w-10 h-10 rounded-full overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ $employee->getMediaUrl('profile_image') }}">
    </div>
    <div>
        <div>{{ $employee->getFullName() }}</div>
        <div class="caption">{{ $employee->employeeInformation?->designation }}</div>
    </div>
</a>