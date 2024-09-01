@section('page-title', 'Create/Edit Candidate')
@section('page-subtitle', 'All Candidate > Create/Edit Candidate')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='full_name' class="input-element" placeholder="Full Name">
                @error('full_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="email" wire:model.blur='email' class="input-element" placeholder="Email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='phone' class="input-element" placeholder="Phone Number">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Enums\CandidateStatus::toArray()" wire:model="candidate_status" x-on:blur="$wire.submit()" placeholder="Candidate Status"/>
                @error('candidate_status') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Models\Vacancy::convertToArray('title')" wire:model="vacancy_id" x-on:blur="$wire.submit()" placeholder="Vacancy"/>
                @error('vacancy_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
