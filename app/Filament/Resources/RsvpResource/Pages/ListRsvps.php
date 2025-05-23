<?php

namespace App\Filament\Resources\RsvpResource\Pages;

use App\Filament\Resources\RsvpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRsvps extends ListRecords
{
    protected static string $resource = RsvpResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            RsvpResource\Widgets\Stats::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
