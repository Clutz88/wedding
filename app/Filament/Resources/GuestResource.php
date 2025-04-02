<?php

namespace App\Filament\Resources;

use App\Enums\DietaryRequirements;
use App\Filament\Exports\GuestExporter;
use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GuestResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $model = Guest::class;

    protected static ?string $slug = 'guests';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name'),
                TextInput::make('email')
                    ->label('Email'),
                Radio::make('type')
                    ->options(['day' => 'Day', 'evening' => 'Evening'])
                    ->label('Type'),
                Radio::make('age_group')
                    ->options(['adult' => 'Adult', 'child' => 'Child'])
                    ->label('Age Group'),
                Select::make('dietary_requirements')
                    ->multiple()
                    ->options(DietaryRequirements::class)
                    ->columnSpanFull(),
                Checkbox::make('attending')->visible(fn (Guest $guest): bool => $guest->id !== null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                SelectColumn::make('age_group')
                    ->options(['adult' => 'Adult', 'child' => 'Child'])
                    ->label('Age Group'),
                SelectColumn::make('type')
                    ->options(['day' => 'Day', 'evening' => 'Evening'])
                    ->label('Type'),
                TextColumn::make('dietary_requirements')
                    ->searchable()
                    ->separator(),
                IconColumn::make('attending')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(GuestExporter::class),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                //
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
