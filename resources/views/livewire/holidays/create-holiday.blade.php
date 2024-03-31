<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg p-4 w-full max-w-md mx-auto">
        <h6 class="border-b border-gray/20 pb-4 mb-4">Add New Holiday</h6>
        <form wire:submit='save'>
            <div class="flex-1 flex-grow mb-5">
                <input type="text" wire:model.blur='date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Date">
                @error('date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow mb-5">
                <input type="text" wire:model.blur='name' class="input-element" placeholder="Name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-center gap-5">
                <button wire:click="close" class="btn btn-small btn-transparent flex-1 flex-grow">Close</button>
                <button type="submit" class="btn btn-purple btn-small flex-1 flex-grow">Save</button>
            </div>        
        </form>
    </div>
</div>
