<?php

namespace App\Filament\Resources\SosialResource\Pages;

use Filament\Actions;
use App\Models\Sosial;
use App\Filament\Resources\SosialResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSosial extends CreateRecord
{
    protected static string $resource = SosialResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (Sosial::count() > 0) {
            throw new \Exception('You cannot create more than one social record.');
        }

        return $data;
    }
}
