<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class Venue extends Settings
{
    public string $name;
    public string $address_line_one;
    public string $town;
    public string $postcode;
    public string $website;
    public ?string $maps_link;

    public static function group(): string
    {
        return 'venue';
    }
}
