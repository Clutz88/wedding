<?php

namespace App\Filament\Resources\itineraryResource\Pages;

use App\Filament\Resources\itineraryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Edititinerary extends EditRecord
{
    protected static string $resource = itineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
