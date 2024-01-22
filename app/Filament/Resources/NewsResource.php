<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use App\Services\BranchService;
use App\Traits\BranchTrait;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class NewsResource extends Resource
{
    use BranchTrait;

    protected static ?string $model = News::class;

    protected static ?string $navigationLabel = 'Новости';
    protected static ?string $breadcrumb = 'Новости';
    protected static ?string $label = 'Новости';
    protected static ?string $pluralLabel = 'Новости';

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Контент';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('h1')
                            ->required()
                            ->maxLength(2048),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(2048),

                        Forms\Components\TextInput::make('order')->label('Приоритет')->type('number'),
                        Textarea::make('description')->required()->label('SEO Desc')
                            ->autofocus() // Autofocus the field.
                            ->rows(6), // The number of rows tall the textarea is.,
                        Textarea::make('content')->required()->label('Контент')
                            ->autofocus() // Autofocus the field.
                            ->rows(6), // The number of rows tall the textarea is.,

                        Forms\Components\Hidden::make('branch_id')->required()->default(BranchService::current()->id),
                    ]),

                Forms\Components\Card::make()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')->image(),
                    ])
//                        Forms\Components\RichEditor::make('body')
//                            ->required(),
//                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Tables\Columns\TextColumn::make('order')
                    ->label('Order')->sortable(),
                Tables\Columns\TextColumn::make('h1')
                    ->label('h1')->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')->searchable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image'),
                Tables\Columns\TextColumn::make('description')
                    ->label('SEO Desc')->searchable()->limit(15),
                Tables\Columns\TextColumn::make('content')
                    ->label('Контент')->searchable()->limit(15),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
