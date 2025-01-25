<?php

namespace App\Filament\Resources\LandingPageResource\Pages;

use App\Filament\Resources\LandingPageResource;
use App\Models\LandingPage;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingPage extends CreateRecord
{
    protected static string $resource = LandingPageResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (LandingPage::count() > 0) {
            throw new \Exception('You cannot create more than one social record.');
        }

        return $data;
    }
}
