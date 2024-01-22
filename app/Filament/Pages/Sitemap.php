<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;

class Sitemap extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';


    protected static ?string $navigationGroup = 'SEO';
    protected static ?int $navigationSort = 0;
    protected static string $view = 'filament.pages.sitemap';

    protected static ?string $title = 'Sitemap';

    public function mount()
    {

        $this->fileContent = File::get(public_path('sitemap.xml'));
    }

    public function saveFile()
    {
        File::put(public_path('sitemap.xml'), $this->fileContent);
    }
}
