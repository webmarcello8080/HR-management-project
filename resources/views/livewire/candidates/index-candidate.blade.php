@section('page-title', 'All Candidates')
@section('page-subtitle', 'See All Candidates')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div>
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('candidate.create') }}">Add New Candidate</a>
        </div>
    </div>
    <div class="table w-full border-collapse">
        <div class="table-row border-b border-gray/20">
            <span class="caption table-cell py-2">Candidate Name</span>
            <span class="caption table-cell py-2">Applied For</span>
            <span class="caption table-cell py-2">Date</span>
            <span class="caption table-cell py-2">Email</span>
            <span class="caption table-cell py-2">Phone</span>
            <span class="caption table-cell py-2">Status</span>
            <span class="caption table-cell py-2">Actions</span>
        </div>
        @foreach ($candidates as $candidate)
            @livewire('candidates.line-candidate', ['candidate' => $candidate], key($candidate->id))
        @endforeach
    </div>
</div>
