<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('wedding.rsvp_deadline', '2025-08-01 00:00:00');
    }
};
