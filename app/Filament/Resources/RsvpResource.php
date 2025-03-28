<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RsvpResource\Pages;
use App\Filament\Resources\RsvpResource\RelationManagers\GuestsRelationManager;
use App\Models\Rsvp;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RsvpResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $model = Rsvp::class;

    protected static ?string $slug = 'rsvps';

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('code'),
                TextInput::make('song_request')->columnSpanFull(),
                Select::make('attending')
                    ->options([false => 'not attending', true => 'attending']),
                Select::make('dietary_requirements')
                    ->options([false => 'no requirements', true => 'requirements']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('code'),
                TextColumn::make('guests.name'),
                TextColumn::make('song_request'),
                IconColumn::make('attending')
                    ->boolean(),
                IconColumn::make('dietary_requirements')
                    ->boolean()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            GuestsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRsvps::route('/'),
            'create' => Pages\CreateRsvp::route('/create'),
            'edit' => Pages\EditRsvp::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
