<div class="setting-container">
    <div class="mb-5">
        <h6 class="mb-0">Employee Types</h6>
        <div class="small-caption">Insert/delete employee types</div>    
    </div>
    <div class="flex flex-wrap items-center gap-5 mb-5">
        @if ($employeeTypes)
            @foreach ($employeeTypes as $type)
                <div class="badge badge-purple badge-big">{{ $type->name }}</div>
            @endforeach
        @else
            <p>No employee types found in the system</p>
        @endif
    </div>
</div>
