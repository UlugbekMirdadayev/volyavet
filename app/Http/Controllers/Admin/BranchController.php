<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BranchService;
use App\Services\VetService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class BranchController extends Controller
{
    protected BranchService $service;
    protected VetService $vetApi;

    public function __construct(VetService $vetApi)
    {
        $this->vetApi = $vetApi;
    }

    public function change(Request $request): RedirectResponse
    {
        $cookie = BranchService::setCurrent($request->route('id'));

        return Redirect::back()
            ->withCookie($cookie)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }
}
