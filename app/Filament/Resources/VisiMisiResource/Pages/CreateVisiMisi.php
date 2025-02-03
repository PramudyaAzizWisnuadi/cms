<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVisiMisi extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
    protected static string $resource = VisiMisiResource::class;
}
