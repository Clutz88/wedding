<?php

namespace App\Filament\Resources\RsvpResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Actions\AssociateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GuestsRelationManager extends RelationManager
{
    protected static string $relationship = 'guests';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                Radio::make('type')
                    ->options(['day' => 'Day', 'evening' => 'Evening'])
                    ->label('Type'),
                Radio::make('age_group')
                    ->options(['adult' => 'Adult', 'child' => 'Child'])
                    ->label('Age Group'),

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
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
