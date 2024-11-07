<?php

namespace App\Livewire\Settings;

use App\Http\Requests\GeneralSettingsRequest;
use App\Settings\GeneralSettings;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\LivewireFilepond\WithFilePond;

class IndexSetting extends Component
{
    use WithFilePond;

    #[Validate]
    public $company_name;
    #[Validate]
    public $company_address;
    #[Validate]
    public $company_phone;
    #[Validate]
    public $company_email;
    #[Validate]
    public $logo;

    public function rules(){
        return (new GeneralSettingsRequest())->rules();
    }

    public function mount(): void
    {
        $settings = resolve(GeneralSettings::class);
        $this->company_name = $settings->company_name;
        $this->company_address = $settings->company_address;
        $this->company_phone = $settings->company_phone;
        $this->company_email = $settings->company_email;
        $this->logo = $settings->logo;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $settings = new GeneralSettings();

        if ($this->logo instanceof TemporaryUploadedFile) {
            $fileExtension =  $this->logo->extension();
            $validated['logo'] = asset('storage/' . $this->logo->storeAs('settings', 'logo.' . $fileExtension, 'public'));
        }

        $settings->fill($validated);
        $settings->save();

        session()->flash('status', 'Settings updated.');

        $this->redirectRoute('setting.index');
    }

    public function render(): View
    {
        return view('livewire.settings.index-setting');
    }
}
