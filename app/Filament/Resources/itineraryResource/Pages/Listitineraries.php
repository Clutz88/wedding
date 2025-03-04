<?php

namespace App\Filament\Resources\itineraryResource\Pages;

use App\Filament\Resources\itineraryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listitineraries extends ListRecords
{
    protected static string $resource = itineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
