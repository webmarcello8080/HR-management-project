@section('page-title', 'All Vacancies')
@section('page-subtitle', 'See All Vacancies')
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
        @foreach ($vacancyStatuses as $key => $status)
            <div class="vacancy-status-drop-area rounded-container transition-all duration-300 basis-1/3"
                ondrop="drop(event, {{ $key }})" 
                ondragover="allowDrop(event)"
                ondragenter="highlightDropZone(event)"
                ondragleave="removeHighlightDropZone(event)"
                >
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-3 h-3 bg-{{ $statusColours[$key - 1] }} rounded-full"></div>
                    <h6 class="mb-0">{{ $status }} Vacancies</h6>
                </div>
                @foreach ($vacancies as $vacancy)
                    @if ($vacancy->vacancy_status->value == $key)
                        @include('partials\vacancies\vacancy-card')
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        var vacancyId = ev.target.getAttribute('data-vacancy-id');
        ev.dataTransfer.setData("vacancyId", vacancyId);
    }

    function drop(ev, newStatus) {
        ev.preventDefault();

        var vacancyId = ev.dataTransfer.getData("vacancyId");
        var livewireId = ev.target.closest('[wire\\:id]').getAttribute('wire:id')

        removeHighlightDropZone(ev);

        Livewire.find(livewireId).call('updateVacancyStatus', vacancyId, newStatus);
    }

    // Function to add multiple highlight classes to the container
    function highlightDropZone(ev) {
        ev.currentTarget.classList.add('shadow-lg', 'shadow-purple');
    }

    // Function to remove highlight classes only when leaving the container
    function removeHighlightDropZone(ev) {
        const container = ev.currentTarget;
        const relatedTarget = ev.relatedTarget;

        // Check if the related target is not a child of the container
        if (!container.contains(relatedTarget)) {
            container.classList.remove('shadow-lg', 'shadow-purple');
        }
    }
</script>
