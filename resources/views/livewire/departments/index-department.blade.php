@section('page-title', 'All Departments')
@section('page-subtitle', 'See All Departments')
<div class="rounded-container grid grid-cols-2 gap-5">
    @foreach ($departments as $department)
        <div class="rounded-container">
            <div class="flex items-center justify-between border-b border-gray/20 pb-2">
                <div>
                    <h6 class="mb-1">{{ $department->name }}</h6>
                    <div class="small-caption">{{ $department->employeeInformation->count() }} Employees</div>
                </div>
                <a href="{{ route('department.show', $department) }}" class="no-underline text-purple" href="">View All</a>
            </div>
            @foreach ($department->employeeInformation as $employeeInformation)
                <a href="{{ route('employee.show', $employeeInformation->employee) }}" class="mt-4 flex items-center justify-between no-underline">
                    @include('partials\employees\employee-budge', ['employee' => $employeeInformation->employee])
                    @svg('arrow-right', 'w-6 h-6')
                </a>
            @endforeach
        </div>
    @endforeach
</div>