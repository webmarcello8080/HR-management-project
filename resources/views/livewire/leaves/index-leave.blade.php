@section('page-title', 'All Leaves')
@section('page-subtitle', 'See All Leaves')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div class="flex items-center gap-5">
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
            <input wire:model.live.debounce.500ms='search_date' type="test" onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Search Date"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('leave.create') }}">Add New Leave</a>
        </div>
    </div>
    <div class="table w-full border-collapse">
        <div class="table-row border-b border-gray/20">
            <span class="caption table-cell py-2">Employee</span>
            <span class="caption table-cell py-2">From Date</span>
            <span class="caption table-cell py-2">To Date</span>
            <span class="caption table-cell py-2">Dayes</span>
            <span class="caption table-cell py-2">Status</span>
            <span class="caption table-cell py-2">Actions</span>
        </div>
        @foreach ($leaves as $leave)
            @livewire('leaves.line-leave', ['leave' => $leave], key($leave->id))
        @endforeach
    </div>
</div>