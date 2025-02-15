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

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Promosi';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Promosi')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar'),
                Forms\Components\FileUpload::make('image2')
                    ->label('Gambar 2'),
                Forms\Components\FileUpload::make('image3')
                    ->label('Gambar 3'),
                Forms\Components\FileUpload::make('image4')
                    ->label('Gambar 4'),
                Forms\Components\FileUpload::make('image5')
                    ->label('Gambar 5'),
                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Tanggal Selesai')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required()
                    ->rule(function ($get) {
                        return function ($attribute, $value, $fail) use ($get) {
                            if (Promosi::where('category_id', $value)->where('id', '!=', $get('id'))->exists()) {
                                $fail('Hanya satu promosi yang dapat dibuat per kategori.');
                            }
                        };
                    }),
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
                    ->label('Gambar 1'),
                Tables\Columns\ImageColumn::make('image2')
                    ->label('Gambar 2'),
                Tables\Columns\ImageColumn::make('image3')
                    ->label('Gambar 3'),
                Tables\Columns\ImageColumn::make('image4')
                    ->label('Gambar 4'),
                Tables\Columns\ImageColumn::make('image5')
                    ->label('Gambar 5'),
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
