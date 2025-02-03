<?php

namespace App\Filament\Resources\TimeLineResource\Pages;

use App\Filament\Resources\TimeLineResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimeLine extends CreateRecord
{
    protected static string $resource = TimeLineResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
