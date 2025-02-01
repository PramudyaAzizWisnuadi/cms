<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Logo;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LogoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LogoResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class LogoResource extends Resource
{
    protected static ?string $model = Logo::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Logos';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public'),
                FileUpload::make('thumbnail')
                    ->image()
                    ->required()
                    ->disk('public'),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TinyEditor::make('deskripsi')
                    ->required(),
                TextInput::make('wa')
                    ->maxLength(255),
                TextInput::make('instagram')
                    ->maxLength(255),
                TextInput::make('tiktok')
                    ->maxLength(255),
                TextInput::make('facebook')
                    ->maxLength(255),
                TextInput::make('alamat')
                    ->maxLength(255),
                TextInput::make('maps'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Logo'),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('wa')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('instagram')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tiktok')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('facebook')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alamat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('maps')->sortable()->searchable(),
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
            'index' => Pages\ListLogos::route('/'),
            'create' => Pages\CreateLogo::route('/create'),
            'edit' => Pages\EditLogo::route('/{record}/edit'),
        ];
    }
}
