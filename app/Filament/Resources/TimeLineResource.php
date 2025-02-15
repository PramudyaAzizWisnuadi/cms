<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeLineResource\Pages;
use App\Filament\Resources\TimeLineResource\RelationManagers;
use App\Models\TimeLine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimeLineResource extends Resource
{
    protected static ?string $model = TimeLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Content Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('icon')
                    ->label('Icon')
                    ->placeholder('ri-stack-line')
                    ->required(),
                Forms\Components\Datepicker::make('date')
                    ->label('Date')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\Select::make('position')
                    ->label('Position')
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title'),
                TextColumn::make('date')
                    ->label('Date'),
                TextColumn::make('description')
                    ->label('Description'),
                TextColumn::make('icon')
                    ->label('Icon'),
                TextColumn::make('position')
                    ->label('Position'),
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
            'index' => Pages\ListTimeLines::route('/'),
            'create' => Pages\CreateTimeLine::route('/create'),
            'edit' => Pages\EditTimeLine::route('/{record}/edit'),
        ];
    }
}
