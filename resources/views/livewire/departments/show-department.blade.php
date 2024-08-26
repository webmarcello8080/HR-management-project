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
    @include('partials.employees.employee-table')
</div>