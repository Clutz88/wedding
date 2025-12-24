<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use App\Filament\Resources\GalleryPhotoResource\Pages\ListGalleryPhotos;
use App\Filament\Resources\GalleryPhotoResource\Pages\CreateGalleryPhoto;
use App\Filament\Resources\GalleryPhotoResource\Pages\EditGalleryPhoto;
use App\Models\GalleryPhoto;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    protected static ?string $slug = 'gallery-photos';

    protected static ?string $label = 'Guest Photos';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-camera';

    protected static string | \UnitEnum | null $navigationGroup = 'Manage';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('guest_name')
                    ->required()
                    ->label('Guest Name'),
                Toggle::make('is_approved')
                    ->label('Approved')
                    ->default(false),
                SpatieMediaLibraryFileUpload::make('wedding-photos')
                    ->collection('wedding-photos')
                    ->multiple()
                    ->image()
                    ->imageEditor()
                    ->label('Photos'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('wedding-photos')
                    ->collection('wedding-photos')
                    ->conversion('thumb')
                    ->label('Photo'),
                TextColumn::make('guest_name')
                    ->searchable()
                    ->sortable()
                    ->label('Guest Name'),
                ToggleColumn::make('is_approved')
                    ->label('Approved'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Uploaded At'),
            ])
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Approval Status')
                    ->placeholder('All photos')
                    ->trueLabel('Approved only')
                    ->falseLabel('Pending only'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('approve')
                        ->label('Approve Selected')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->action(fn (Collection $records) => $records->each->update(['is_approved' => true]))
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleryPhotos::route('/'),
            'create' => CreateGalleryPhoto::route('/create'),
            'edit' => EditGalleryPhoto::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['guest_name'];
    }
}
