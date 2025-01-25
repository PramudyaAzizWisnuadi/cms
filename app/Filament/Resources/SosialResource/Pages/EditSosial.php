<?php

namespace App\Filament\Resources\SosialResource\Pages;

use App\Filament\Resources\SosialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSosial extends EditRecord
{
    protected static string $resource = SosialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
