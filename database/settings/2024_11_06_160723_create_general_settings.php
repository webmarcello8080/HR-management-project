<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.company_name', 'HR Manager');
        $this->migrator->add('general.company_address', 'Street Address');
        $this->migrator->add('general.company_phone', '077 526 2092');
        $this->migrator->add('general.company_email', 'please@change.me');
        $this->migrator->add('general.favicon', '');
    }
};
