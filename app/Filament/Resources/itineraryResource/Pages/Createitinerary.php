<?php

namespace App\Filament\Resources\itineraryResource\Pages;

use App\Filament\Resources\ItineraryResource;
use Filament\Resources\Pages\CreateRecord;

class Createitinerary extends CreateRecord
{
    protected static string $resource = ItineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
