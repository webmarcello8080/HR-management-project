<div class="gray-container mb-4">
    <div class="flex items-center gap-5 mb-5">
        @svg('briefcase', 'w-6 h-6')
        <div>
            <h6 class="mb-0">{{ $vacancy->title }}</h6>
            <div class="small-caption">{{ $vacancy?->department?->name }}</div>
        </div>
    </div>
    <div class="flex flex-wrap items-center gap-4 mb-5">
        <div class="budge budge-purple">{{ $vacancy?->working_day?->name }}</div>
        @if ($vacancy->employeeType)
            <div class="budge budge-purple">{{ $vacancy?->employeeType?->name }}</div>
        @endif
    </div>
    <div class="flex gap-4 justify-between">
        @if ($vacancy->location)
            <div class="flex items-center gap-4">
                @svg('location', 'w-6 h-6')
                <div>{{ $vacancy?->location?->name }}</div>
            </div>
        @endif
        <div> 
            <span class="font-bold">£{{ $vacancy->amount }}</span>/<span>{{ $vacancy->amount_per }}</span>
        </div>
    </div>
</div>