<div class="table w-full border-collapse">
    <div class="table-row border-b border-grey/20">
        <span class="caption table-cell py-2">Employee Name</span>
        <span class="caption table-cell py-2">Employee ID</span>
        <span class="caption table-cell py-2">Department</span>
        <span class="caption table-cell py-2">Type</span>
        <span class="caption table-cell py-2">Working Day</span>
        <span class="caption table-cell py-2">Location</span>
        <span class="caption table-cell py-2">Actions</span>
    </div>
    @if ($employees->count())
        @foreach ($employees as $employee)
            @livewire('employees.line-employee', ['employee' => $employee], key('employee-' . $employee->id))
        @endforeach            
    @else
        <p class="my-5 caption">No employees found</p>
    @endif
</div>
@include('partials.bottom-table-bar', ['collection' => $employees])
