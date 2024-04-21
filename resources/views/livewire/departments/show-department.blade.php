@section('page-title', $department->name . ' Department')
@section('page-subtitle', 'All Departments > ' . $department->name)
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div>
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('employee.create') }}">Add New Employee</a>
            <button class="btn btn-transparent btn-big">Filters</button>
        </div>
    </div>
    <div class="table w-full border-collapse">
        <div class="table-row border-b border-gray/20">
            <span class="caption table-cell py-2">Employee Name</span>
            <span class="caption table-cell py-2">Employee ID</span>
            <span class="caption table-cell py-2">Department</span>
            <span class="caption table-cell py-2">Type</span>
            <span class="caption table-cell py-2">Working Day</span>
            <span class="caption table-cell py-2">Location</span>
            <span class="caption table-cell py-2">Actions</span>
        </div>
        @foreach ($employees as $employee)
            @livewire('employees.line-employee', ['employee' => $employee], key($employee->id))
        @endforeach
    </div>
    @include('partials.pagination-bar', ['collection' => $employees])
</div>