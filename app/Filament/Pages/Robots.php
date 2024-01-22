<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class Robots extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.robots';
    protected static ?string $navigationGroup = 'SEO';
    protected static ?string $title = 'Robots';
    protected static ?int $navigationSort = 0;
    public function mount()
    {

        $this->fileContent = File::get(public_path('robots.txt'));
    }

    public function saveFile()
    {
        File::put(public_path('robots.txt'), $this->fileContent);
    }

}
