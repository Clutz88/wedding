<?php

namespace App\Services;

use App\Settings\Wedding;

class WeddingService
{
    public function __construct(public Wedding $weddingSettings)
    {
        //
    }

    public function __call(string $name, array $arguments)
    {
        return $this->weddingSettings->{$name};
    }
}
