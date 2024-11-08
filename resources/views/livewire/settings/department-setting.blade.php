<div class="setting-container">
    <div class="mb-5">
        <h6 class="mb-0">Departments</h6>
        <div class="small-caption">Insert/delete departments</div>    
    </div>
    <div class="flex flex-wrap items-center gap-5 mb-5">
        @if ($departments)
            @foreach ($departments as $department)
                <div class="badge badge-purple badge-big !flex gap-4 items-center">
                    <span>{{ $department->name }}</span>
                    <a 
                    class="cursor-pointer"
                    wire:confirm="Are you sure you want to delete this Department?"
                    wire:click='removeDepartment({{ $department->id }})'>
                        @svg('x', 'w-3 h-3')
                    </a>
                </div>
            @endforeach
        @else
            <p>No departments found in the system</p>
        @endif
    </div>
    <div class="flex flex-wrap items-center justify-between pb-5">
        <div>
            <p class="mb-0">Insert a new Department</p>
        </div>
        <form class="flex gap-4 items-start justify-end" wire:submit='newDepartment'>
            <div class="basis-[250px] shrink-0 grow-0">
                <input type="text" wire:model.blur='name' class="input-element" placeholder="New department">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </form>
    </div>
</div>
