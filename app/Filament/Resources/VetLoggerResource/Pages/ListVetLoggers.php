<?php

namespace App\Filament\Resources\VetLoggerResource\Pages;

use App\Filament\Resources\VetLoggerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVetLoggers extends ListRecords
{
    protected static string $resource = VetLoggerResource::class;

    protected function getActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
