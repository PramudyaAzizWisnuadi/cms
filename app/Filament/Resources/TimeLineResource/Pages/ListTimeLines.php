<?php

namespace App\Filament\Resources\TimeLineResource\Pages;

use App\Filament\Resources\TimeLineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeLines extends ListRecords
{
    protected static string $resource = TimeLineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
