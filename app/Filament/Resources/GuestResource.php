<?php

namespace App\Filament\Resources;

use App\Enums\DietaryRequirements;
use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuestResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $model = Guest::class;

    protected static ?string $slug = 'guests';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name'),
                TextInput::make('email')
                    ->label('Email'),
                Radio::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->label('Gender'),
                Radio::make('age_group')
                    ->options(['adult' => 'Adult', 'child' => 'Child'])
                    ->label('Age Group'),
                Select::make('dietary_requirements')
                    ->multiple()
                    ->options(DietaryRequirements::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('dietary_requirements')
                    ->separator(),
                TextColumn::make('id')
                    ->formatStateUsing(fn (string $state): HtmlString => new HtmlString(QrCode::size(100)->generate($state))),
                //                    ->getStateUsing(fn ($record): string => str(QrCode::size(100)->generate($record->id))->ltrim('<!--?xml version="1.0" encoding="UTF-8"?-->'))
                //                    ->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
