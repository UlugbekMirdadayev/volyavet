<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class Policy extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Политика';
    protected static ?string $breadcrumb = 'Политика';
    protected static ?string $label = 'Политика';
    protected static ?string $pluralLabel = 'Политика';
    protected static ?string $title = 'Политика конфиденциальности';
    protected static string $view = 'filament.pages.policy';
    protected static ?string $slug = 'policy';
    protected static ?int $navigationSort = 0;
    public function mount()
    {

        $this->fileContent = File::get(public_path('policy.html'));
    }

    public function saveFile()
    {
        File::put(public_path('policy.html'), $this->fileContent);
    }

}
