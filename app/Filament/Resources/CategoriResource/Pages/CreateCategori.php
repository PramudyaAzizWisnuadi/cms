<?php

namespace App\Filament\Resources\CategoriResource\Pages;

use App\Filament\Resources\CategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategori extends CreateRecord
{
    protected static string $resource = CategoriResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
