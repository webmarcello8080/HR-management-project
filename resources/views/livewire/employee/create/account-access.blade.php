<div>
    <form wire:submit='save'>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='email' class="input-element" placeholder="Internal Email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='slack_id' class="input-element" placeholder="Enter Slack ID">
                @error('slack_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='skype_id' class="input-element" placeholder="Enter Skype ID">
                @error('skype_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='github_id' class="input-element" placeholder="Enter Github ID">
                @error('github_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Add</button>
        </div>
    </form>
</div>
