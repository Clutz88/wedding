<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class Wedding extends Settings
{
    public string $date;

    public string $groom;

    public string $bride;

    public static function group(): string
    {
        return 'wedding';
    }
}
