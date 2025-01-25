<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sosial;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SosialResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SosialResource\RelationManagers;

class SosialResource extends Resource
{
    protected static ?string $model = Sosial::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Sosial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('whatsapp')
                    ->label('Whatsapp'),
                TextInput::make('facebook')
                    ->label('Facebook'),
                TextInput::make('instagram')
                    ->label('Instagram'),
                TextInput::make('twitter')
                    ->label('Twitter'),
                TextInput::make('youtube')
                    ->label('Youtube'),
                TextInput::make('telegram')
                    ->label('Telegram'),
                TextInput::make('email')
                    ->label('Email'),
                TextInput::make('tiktok')
                    ->label('Tik Tok'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('whatsapp')
                    ->label('Whatsapp'),
                TextColumn::make('facebook')
                    ->label('Facebook'),
                TextColumn::make('instagram')
                    ->label('Instagram'),
                TextColumn::make('twitter')
                    ->label('Twitter'),
                TextColumn::make('youtube')
                    ->label('Youtube'),
                TextColumn::make('telegram')
                    ->label('Telegram'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('tiktok')
                    ->label('TikTok'),
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
            'index' => Pages\ListSosials::route('/'),
            'create' => Pages\CreateSosial::route('/create'),
            'edit' => Pages\EditSosial::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return Sosial::count() === 0;
    }
}
