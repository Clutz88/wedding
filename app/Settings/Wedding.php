<?php

namespace App\Settings;

use Carbon\Carbon;
use Spatie\LaravelSettings\Settings;

class Wedding extends Settings
{
    public Carbon $date;
    public string $groom;
    public string $bride;

    public static function group(): string
    {
        return 'wedding';
    }
}
