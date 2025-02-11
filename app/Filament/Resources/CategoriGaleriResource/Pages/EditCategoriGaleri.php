<?php

namespace App\Filament\Resources\CategoriGaleriResource\Pages;

use App\Filament\Resources\CategoriGaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoriGaleri extends EditRecord
{
    protected static string $resource = CategoriGaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
