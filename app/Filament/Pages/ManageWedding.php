<?php

namespace App\Filament\Pages;

use Filament\Schemas\Schema;
use App\Settings\Wedding;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ManageWedding extends SettingsPage
{
    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    protected static string | \BackedEnum | null $navigationIcon = 'lineawesome-ring-solid';

    protected static string $settings = Wedding::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('groom')
                    ->label('Groom'),
                TextInput::make('bride')
                    ->label('Bride'),
                DateTimePicker::make('date')
                    ->seconds(false)
                    ->native(false)
                    ->label('Start'),
                DateTimePicker::make('rsvp_deadline')
                    ->native(false)
                    ->label('RSVP Deadline'),
            ]);
    }
}
