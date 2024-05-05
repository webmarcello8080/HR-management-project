@section('page-title', 'All Attendances')
@section('page-subtitle', 'See All Attendances')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div class="flex items-center gap-5">
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
            <input wire:model.live.debounce.500ms='search_date' type="test" onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Search Date"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('attendance.create') }}">Add New Attendance</a>
        </div>
    </div>
    <div class="table w-full border-collapse">
        <div class="table-row border-b border-gray/20">
            <span class="caption table-cell py-2">Employee</span>
            <span class="caption table-cell py-2">Date</span>
            <span class="caption table-cell py-2">From</span>
            <span class="caption table-cell py-2">To</span>
            <span class="caption table-cell py-2">Working Hours</span>
            <span class="caption table-cell py-2">Type</span>
            <span class="caption table-cell py-2">Actions</span>
        </div>
        @if ($attendances->count())
            @foreach ($attendances as $attendance)
                @livewire('attendances.line-attendance', ['attendance' => $attendance, 'display_user' => true], key($attendance->id))
            @endforeach
        @else
            <h6 class="my-5 caption">No attendances found</h6>
        @endif
    </div>
    @include('partials.pagination-bar', ['collection' => $attendances])
</div>