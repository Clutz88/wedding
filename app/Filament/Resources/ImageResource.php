<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ImageResource\Pages\ListImages;
use App\Filament\Resources\ImageResource\Pages\CreateImage;
use App\Filament\Resources\ImageResource\Pages\EditImage;
use App\Filament\Resources\ImageResource\Pages;
use App\Models\Image;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $slug = 'images';

    protected static ?string $label = 'Gallery';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-photo';

    protected static string | \UnitEnum | null $navigationGroup = 'Manage';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('description')
                    ->required(),
                FileUpload::make('location')
                    ->image()
                    ->optimize('avif')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '9:16',
                        '4:3',
                        '1:1',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('description'),
                ImageColumn::make('location'),
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
            'index' => ListImages::route('/'),
            'create' => CreateImage::route('/create'),
            'edit' => EditImage::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
