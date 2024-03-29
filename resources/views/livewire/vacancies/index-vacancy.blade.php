@section('page-title', 'All Vacancies')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div>
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('vacancy.create') }}">Add New Vacancy</a>
        </div>
    </div>
    <div class="flex gap-5">
        @foreach ($vacancyStatuses as $status)
            <div class="rounded-container basis-1/3">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-3 h-3 bg-{{ $statusColours[$status->value - 1] }} rounded-full"></div>
                    <h6 class="mb-0">{{ $status->name }} Vacancies</h6>
                </div>
                @foreach ($vacancies as $vacancy)
                    @if ($vacancy->vacancy_status->value == $status->value)
                        @include('partials\vacancies\vacancy-card')
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>