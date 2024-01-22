<?php

namespace App\Providers;

use App\Services\BranchService;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppPanelProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::registerRenderHook(
            'user-menu.start',
            fn (): string => view('banner-switcher', [
                'items' => BranchService::getList(),
                'currentBranch' => BranchService::current(),
            ]),
        );
    }
}
