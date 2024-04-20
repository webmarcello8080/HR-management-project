@section('page-title', 'Create/Edit Candidate')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='title' class="input-element" placeholder="Vacancy Title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='expiring_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Expiring Date">
                @error('expiring_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
