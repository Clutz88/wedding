<?php

namespace App\Filament\Resources\itineraryResource\Pages;

use App\Filament\Resources\itineraryResource;
use Filament\Resources\Pages\CreateRecord;

class Createitinerary extends CreateRecord
{
    protected static string $resource = itineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
