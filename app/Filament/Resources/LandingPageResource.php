<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LandingPage;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LandingPageResource\Pages;
use App\Filament\Resources\LandingPageResource\RelationManagers;
use Faker\Core\File;
use Filament\Forms\Components\FileUpload;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Nette\Utils\Html;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-command-line';
    protected static ?string $navigationGroup = 'Content Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('fotodepan')
                    ->image()
                    ->helperText('Ukuran gambar lanscape 800x600 pixel.')
                    ->nullable(),
                TinyEditor::make('home'),
                TinyEditor::make('tentangkami'),
                TinyEditor::make('blog'),
                TinyEditor::make('kontak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('fotodepan')
                    ->label('Foto Depan'),
                TextColumn::make('home')
                    ->limit(20),
                TextColumn::make('tentangkami')
                    ->limit(20),
                TextColumn::make('blog')
                    ->limit(20),
                TextColumn::make('kontak')
                    ->limit(20),
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
            'index' => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit' => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return LandingPage::count() === 0;
    }
}
