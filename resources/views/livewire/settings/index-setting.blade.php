@section('page-title', 'Settings')
@section('page-subtitle', 'AllSystem Settings')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="setting-container">
            <h6>Company Information</h6>
            <div class="flex justify-center gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Name</label>
                    <input type="text" wire:model.blur='company_name' class="input-element" placeholder="Company Name">
                    @error('company_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Address</label>
                    <input type="text" wire:model.blur='company_address' class="input-element" placeholder="Company Address">
                    @error('company_address') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-center gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Phone</label>
                    <input type="text" wire:model.blur='company_phone' class="input-element" placeholder="Company Phone">
                    @error('company_phone') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Email</label>
                    <input type="text" wire:model.blur='company_email' class="input-element" placeholder="Company Email">
                    @error('company_email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>