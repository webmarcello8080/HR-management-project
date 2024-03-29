<div class="flex items-center justify-between pb-8 mb-8 border-b border-gray/20">
    <div class=" flex items-center gap-4">
        <div class="rounded-lg w-24 h-24 overflow-hidden">
            <img class="w-full h-full object-cover" src="{{ $employee->getMediaUrl('profile_image') }}" alt="">
        </div>
        <div>
            <h5 class="mb-2">{{ $employee->getFullName() }}</h5>
            <div class="mb-2 flex gap-2">@svg('briefcase', 'w-6 h-6') <span>{{ $employee?->employeeInformation->designation }}</span></div>
            <a href="mailto:{{ $employee?->user->email }}" class="mb-2 flex gap-2">@svg('mail', 'w-6 h-6') <span>{{ $employee?->user->email }}</span></a>
        </div>
    </div>
    @can('admin')
        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-big btn-purple">Edit Profile</a>
    @endcan
</div>