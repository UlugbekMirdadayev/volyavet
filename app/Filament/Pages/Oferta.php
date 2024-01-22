<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;
use SebastiaanKloos\FilamentCodeEditor\Components\CodeEditor;

class Oferta extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Оферта';
    protected static ?string $breadcrumb = 'Оферта';
    protected static ?string $label = 'Оферта';
    protected static ?string $pluralLabel = 'Оферта';
    protected static ?string $title = 'Оферта';
    protected static string $view = 'filament.pages.oferta';
    public function mount()
    {

        $this->fileContent = File::get(public_path('oferta.html'));
    }

    public function saveFile()
    {
        File::put(public_path('oferta.html'), $this->fileContent);
    }

}
