@section('page-title', 'Holidays')
@section('page-subtitle', 'See All Holidays')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div>
            <input wire:model.live='year' class="input-element" type="number" min="1900" max="2099" step="1" />
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" wire:click="toggleModal">Add New Holiday</a>
        </div>
    </div>
    <div class="table w-full border-collapse mb-5">
        <div class="table-row border-b border-grey/20">
            <span class="caption table-cell py-2">Date</span>
            <span class="caption table-cell py-2">Day</span>
            <span class="caption table-cell py-2">Holiday Name</span>
            <span class="caption table-cell py-2"></span>
        </div>
        @if ($holidays->count())
            @foreach ($holidays as $holiday)
                @livewire('holidays.line-holiday', ['holiday' => $holiday], key('holiday-' . $holiday->id))
            @endforeach   
        @else
            <h6 class="my-5 caption">No holidays found</h6>
        @endif
    </div>
    <div class="flex flex-wrap gap-5 items-center font-bold">
        <div class="flex items-center gap-2"><span class="bg-purple w-3 h-3 rounded-full"></span>Upcoming</div>
        <div class="flex items-center gap-2"><span class="bg-grey/20 w-3 h-3 rounded-full"></span>Past holidays</div>
    </div>
    @if($showModal)
        @livewire('holidays.create-holiday', key('holiday-modal'))
    @endif
</div>
