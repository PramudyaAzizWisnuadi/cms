<?php

namespace App\Filament\Resources\KategoriPromosiResource\Pages;

use App\Filament\Resources\KategoriPromosiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriPromosi extends EditRecord
{
    protected static string $resource = KategoriPromosiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
