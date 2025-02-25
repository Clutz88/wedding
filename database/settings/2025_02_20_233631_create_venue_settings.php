<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('venue.name', 'The Croft Hotel');
        $this->migrator->add('venue.address_line_one', 'Croft-on-Tees');
        $this->migrator->add('venue.town', 'Darlington');
        $this->migrator->add('venue.postcode', 'DL2 2ST');
        $this->migrator->add('venue.website', 'https://www.croft-hotel.com/');
        $this->migrator->add('venue.maps_link', 'https://maps.app.goo.gl/rY4pXF4rHU5z6xnT6');
    }
};
