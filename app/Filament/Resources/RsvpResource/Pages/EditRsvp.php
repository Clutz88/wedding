<?php

namespace App\Filament\Resources\RsvpResource\Pages;

use App\Filament\Resources\RsvpResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRsvp extends EditRecord
{
    protected static string $resource = RsvpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
