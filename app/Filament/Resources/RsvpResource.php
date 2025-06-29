<?php

namespace App\Filament\Resources;

use App\Filament\Exports\RequestExporter;
use App\Filament\Resources\RsvpResource\Pages;
use App\Filament\Resources\RsvpResource\RelationManagers\GuestsRelationManager;
use App\Models\Rsvp;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RsvpResource extends Resource
{
    protected static ?string $navigationGroup = 'Guests';

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
                TextInput::make('song_request')
                    ->columnSpanFull(),
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
                TextColumn::make('name')
                    ->sortable(),
                TextColumn::make('code')
                    ->sortable(),
                TextColumn::make('guests.name')
                    ->sortable(),
                TextColumn::make('song_request')
                    ->sortable(),
                IconColumn::make('attending')
                    ->sortable()
                    ->boolean(),
                IconColumn::make('dietary_requirements')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('attending')
                    ->label('Attending Status')
                    ->options([
                        'attending' => 'Attending',
                        'not_attending' => 'Not Attending',
                        'not_responded' => 'Not Responded',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['value'] ?? null, function (Builder $query, $value): Builder {
                            return match ($value) {
                                'attending' => $query->where('attending', true),
                                'not_attending' => $query->where('attending', false),
                                'not_responded' => $query->whereNull('attending'),
                                default => $query,
                            };
                        });
                    }),
                SelectFilter::make('dietary_requirements')
                    ->label('Dietary Requirements')
                    ->options([
                        'requirements' => 'Requirements',
                        'no_requirements' => 'No Requirements',
                        'not_responded' => 'Not Responded',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['value'] ?? null, function (Builder $query, $value): Builder {
                            return match ($value) {
                                'requirements' => $query->where('dietary_requirements', true),
                                'no_requirements' => $query->where('dietary_requirements', false),
                                'not_responded' => $query->whereNull('dietary_requirements'),
                                default => $query,
                            };
                        });
                    }),
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
