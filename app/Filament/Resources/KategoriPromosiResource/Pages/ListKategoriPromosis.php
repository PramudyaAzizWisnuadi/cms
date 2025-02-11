<?php

namespace App\Filament\Resources\KategoriPromosiResource\Pages;

use App\Filament\Resources\KategoriPromosiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriPromosis extends ListRecords
{
    protected static string $resource = KategoriPromosiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
