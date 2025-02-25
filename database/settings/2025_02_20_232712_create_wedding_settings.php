<?php

use Carbon\Carbon;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('wedding.date', Carbon::create(2025, 03, 06, 13, 30, 00));
        $this->migrator->add('wedding.groom', 'Chris');
        $this->migrator->add('wedding.bride', 'Kate');
    }
};
