<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriGaleriResource\Pages;
use App\Filament\Resources\CategoriGaleriResource\RelationManagers;
use App\Models\CategoriGaleri;
use App\Models\CategoryGalery;
use App\Models\GaleryCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriGaleriResource extends Resource
{
    protected static ?string $model = CategoryGalery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Galery';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Kategori')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Kategori'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoriGaleris::route('/'),
            'create' => Pages\CreateCategoriGaleri::route('/create'),
            'edit' => Pages\EditCategoriGaleri::route('/{record}/edit'),
        ];
    }
}
