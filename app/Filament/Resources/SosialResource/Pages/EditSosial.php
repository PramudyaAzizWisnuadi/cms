<?php

namespace App\Filament\Resources\SosialResource\Pages;

use App\Filament\Resources\SosialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSosial extends EditRecord
{
    protected static string $resource = SosialResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
