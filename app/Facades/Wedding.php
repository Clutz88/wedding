<?php

namespace App\Facades;

use App\Services\WeddingService;
use Illuminate\Support\Facades\Facade;

/**
 * @see WeddingService
 */
class Wedding extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WeddingService::class;
    }
}
