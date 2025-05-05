<?php

namespace App\Settings;

use Carbon\Carbon;
use Spatie\LaravelSettings\Settings;

class Wedding extends Settings
{
    public string $date;

    public string $rsvp_deadline;

    public string $groom;

    public string $bride;

    public static function group(): string
    {
        return 'wedding';
    }

    public function rsvpDeadline(): Carbon
    {
        return Carbon::parse($this->rsvp_deadline);
    }
}
