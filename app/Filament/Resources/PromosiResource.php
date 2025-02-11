<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromosiResource\Pages;
use App\Filament\Resources\PromosiResource\RelationManagers;
use App\Models\Promosi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromosiResource extends Resource
{
    protected static ?string $model = Promosi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Promosi')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Tanggal Selesai')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Promosi'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->label('Kategori'),
                TextColumn::make('start_date')
                    ->searchable()
                    ->label('Tanggal Mulai'),
                TextColumn::make('end_date')
                    ->searchable()
                    ->label('Tanggal Selesai'),
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
            'index' => Pages\ListPromosis::route('/'),
            'create' => Pages\CreatePromosi::route('/create'),
            'edit' => Pages\EditPromosi::route('/{record}/edit'),
        ];
    }
}
