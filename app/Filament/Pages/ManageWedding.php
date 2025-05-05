<?php

namespace App\Filament\Pages;

use App\Settings\Wedding;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageWedding extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'lineawesome-ring-solid';

    protected static string $settings = Wedding::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
