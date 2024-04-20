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
                <select wire:model.blur='candidate_status' class="input-element">
                    <option value="">Vacancy Status</option>
                    @foreach (\App\Enums\CandidateStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                </select>
                @error('candidate_status') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='vacancy_id' class="input-element">
                    <option value="">Vacancy</option>
                    @foreach (\App\Models\Vacancy::all() as $vacancy)
                        <option value="{{ $vacancy->id }}">{{ $vacancy->title }}</option>
                    @endforeach
                </select>
                @error('vacancy_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
