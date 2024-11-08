<div draggable="true"
    data-vacancy-id="{{ $vacancy->id }}"
    ondragstart="drag(event)"
    class="vacancy-card block no-underline grey-container mb-4 transition duration-300 hover:scale-105 cursor-move">
    <div class="flex justify-between gap-4 mb-5">
        <div class="flex items-center gap-5">
            @svg('briefcase', 'w-6 h-6')
            <a href="{{ route('vacancy.edit', $vacancy) }}" class="no-underline">
                <h6 class="mb-0">{{ $vacancy->title }}</h6>
                <div class="small-caption">{{ $vacancy?->department?->name }}</div>
            </a>
        </div>
        @svg('move', 'w-6 h-6')
    </div>
    <div class="flex flex-wrap items-center gap-4 mb-5">
        <div class="badge badge-purple">{{ $vacancy?->working_day?->label() }}</div>
        @if ($vacancy->employeeType)
            <div class="badge badge-purple">{{ $vacancy?->employeeType?->name }}</div>
        @endif
    </div>
    <div class="flex gap-4 justify-between">
        <div class="flex items-center gap-4">
            @if ($vacancy->location)
                @svg('location', 'w-6 h-6')
                <div>{{ $vacancy?->location?->name }}</div>
            @endif
        </div>
        <div> 
            <span class="font-semibold">{{ $vacancy->amount }}</span>/<span>{{ $vacancy->amount_per }}</span>
        </div>
    </div>
</div>
