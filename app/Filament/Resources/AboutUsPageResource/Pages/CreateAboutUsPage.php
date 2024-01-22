<?php

namespace App\Filament\Resources\AboutUsPageResource\Pages;

use App\Filament\Resources\AboutUsPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutUsPage extends CreateRecord
{
    protected static string $resource = AboutUsPageResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
