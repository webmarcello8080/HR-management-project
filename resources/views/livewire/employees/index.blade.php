<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <form action="">
            <input type="text" class="input-element" placeholder="Search"/>
        </form>
        <div class="flex items-center justify-center gap-5 mb-5">
            <a class="btn btn-purple btn-big" href="{{ route('employee.create') }}">Add New Employee</a>
            <button class="btn btn-transparent btn-big">Filters</button>
        </div>
    </div>
    <div class="table w-full border-collapse">
        <div class="table-row border-b border-gray/20">
            <span class="caption table-cell py-2">Employee Name</span>
            <span class="caption table-cell py-2">Employee ID</span>
            <span class="caption table-cell py-2">Department</span>
            <span class="caption table-cell py-2">Designation</span>
            <span class="caption table-cell py-2">Type</span>
            <span class="caption table-cell py-2">Working Day</span>
            <span class="caption table-cell py-2">Actions</span>
        </div>
        @foreach ($employees as $employee)
            @livewire('employees.line', ['employee' => $employee], key($employee->id))
        @endforeach
    </div>
</div>
