<?php

namespace App\Filament\Resources\SosialResource\Pages;

use App\Filament\Resources\SosialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSosials extends ListRecords
{
    protected static string $resource = SosialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
