<?php

namespace App\Filament\Resources\AboutUsPageResource\Pages;

use App\Filament\Resources\AboutUsPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutUsPage extends EditRecord
{
    protected static string $resource = AboutUsPageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
