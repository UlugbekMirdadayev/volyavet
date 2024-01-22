<?php

namespace App\Filament\Resources\VetLoggerResource\Pages;

use App\Filament\Resources\VetLoggerResource;
use App\Services\VetService;
use Closure;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditVetLogger extends EditRecord
{
    protected static string $resource = VetLoggerResource::class;

    protected static string $view = 'filament.resources.vetmanager.index';


    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->before(function($action) {
                $data = $this->data; //action['data']['crm_user_id']
                (new VetService())->removeClient($data['crm_user_id']);
            }),
        ];
    }
}
