<?php

namespace App\Livewire\Settings;

use App\Http\Requests\SystemSettingsRequest;
use App\Settings\SystemSettings;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\LivewireFilepond\WithFilePond;

class SystemSetting extends Component
{
    use WithFilePond;

    #[Validate]
    public $currency;
    #[Validate]
    public $favicon;
    #[Validate]
    public $date_format;

    public function rules(): array
    {
        return (new SystemSettingsRequest())->rules();
    }

    public function mount(): void
    {
        $settings = resolve(SystemSettings::class);
        $this->currency = $settings->currency;
        $this->date_format = $settings->date_format;
        $this->favicon = $settings->favicon;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $settings = new SystemSettings();

        if ($this->favicon instanceof TemporaryUploadedFile) {
            $fileExtension =  $this->favicon->extension();
            $validated['favicon'] = asset('storage/' . $this->favicon->storeAs('settings', 'favicon.' . $fileExtension, 'public'));
        }

        $settings->fill($validated);
        $settings->save();

        session()->flash('status', 'System settings updated.');

        $this->redirectRoute('setting.index');
    }

    public function render()
    {
        return view('livewire.settings.system-setting', [
            'date_formats' => \App\Enums\DateFormat::toArray()
        ]);
    }
}
