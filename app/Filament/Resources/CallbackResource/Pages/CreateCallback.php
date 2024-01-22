<?php

namespace App\Filament\Resources\CallbackResource\Pages;

use App\Filament\Resources\CallbackResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCallback extends CreateRecord
{
    protected static string $resource = CallbackResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
