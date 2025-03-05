<?php

namespace App\Services;

use App\Settings\Wedding;
use Carbon\Carbon;

class WeddingService
{
    public function __construct(public Wedding $weddingSettings)
    {
        //
    }

    public function date(): Carbon
    {
        return Carbon::parse($this->weddingSettings->date);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->weddingSettings->{$name};
    }
}
