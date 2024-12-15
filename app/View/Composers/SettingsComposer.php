<?php
 
namespace App\View\Composers;

use App\Enums\Currency;
use App\Enums\DateFormat;
use App\Settings\GeneralSettings;
use App\Settings\SystemSettings;
use Illuminate\View\View;
 
class SettingsComposer
{
    /**
     * Bind settings data to the variable that will be passed to the view through:
     * class: App\Providers\AppServiceProvider
     */
    public function compose(View $view): void
    {
        $view->with('setting_logo', app(GeneralSettings::class)->logo);
        $view->with('setting_company_name', app(GeneralSettings::class)->company_name);
        $view->with('setting_favicon', app(SystemSettings::class)->favicon);

        // get currency enum from currency saved in Setting table in database
        $currencyEnum = Currency::from(app(SystemSettings::class)->currency);
        $currencySign = $currencyEnum->sign();
    
        $view->with('setting_currency', $currencySign);

        // get date_format enum from currency saved in Setting table in database
        $dateFormatEnum = DateFormat::from(app(SystemSettings::class)->date_format);
        $dateFormat = $dateFormatEnum->format();
    
        $view->with('setting_date_format', $dateFormat);    
    }
}