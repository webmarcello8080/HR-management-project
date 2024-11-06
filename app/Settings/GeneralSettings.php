<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    /**
     * @var string The company_name of the site
     */
    public string $company_name;

    /**
     * @var string The company_address of the site
     */
    public string $company_address;

    /**
     * @var string The company_phone of the site
     */
    public string $company_phone;

    /**
     * @var string The company_email of the site
     */
    public string $company_email;

    /**
     * @var string The favicon of the site
     */
    public string $favicon;

    public static function group(): string
    {
        return 'general';
    }
}