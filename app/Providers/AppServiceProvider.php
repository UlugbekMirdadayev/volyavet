<?php

namespace App\Providers;

use App\Services\BranchService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(BranchService $service)
    {
        view()->share('current_branch', $service->current());
        view()->share('branches', $service->getList());
    }
}
