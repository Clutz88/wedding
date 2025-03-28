<?php

namespace App\Filament\Resources\RsvpResource\RelationManagers;

use App\Models\Guest;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AssociateAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GuestsRelationManager extends RelationManager
{
    protected static string $relationship = 'guests';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email'),

                TextInput::make('gender'),

                TextInput::make('age_group'),

                TextInput::make('notes'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?Guest $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?Guest $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                Checkbox::make('attending'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender'),

                TextColumn::make('age_group'),

                TextColumn::make('dietary_requirements'),
                IconColumn::make('attending')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AssociateAction::make()
                    ->multiple(),
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
}
