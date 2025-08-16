<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\itineraryResource\Pages\Listitineraries;
use App\Filament\Resources\itineraryResource\Pages\Createitinerary;
use App\Filament\Resources\itineraryResource\Pages\Edititinerary;
use App\Filament\Resources\itineraryResource\Pages;
use App\Models\Itinerary;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItineraryResource extends Resource
{
    protected static ?string $model = Itinerary::class;

    protected static ?string $slug = 'itineraries';

    protected static ?string $label = 'Order of service';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-queue-list';

    protected static string | \UnitEnum | null $navigationGroup = 'Manage';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                RichEditor::make('description')
                    ->required(),

                TimePicker::make('time')
                    ->seconds(false)
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description'),

                TextColumn::make('time')
                    ->time(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Listitineraries::route('/'),
            'create' => Createitinerary::route('/create'),
            'edit' => Edititinerary::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
