<?php

namespace App\Filament\Resources\SymptomsResource\Pages;

use App\Filament\Resources\SymptomsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSymptoms extends CreateRecord
{
    protected static string $resource = SymptomsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
