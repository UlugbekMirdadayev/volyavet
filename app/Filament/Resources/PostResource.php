<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = 'Статьи';
    protected static ?string $breadcrumb = 'Статьи';
    protected static ?string $label = 'Статьи';
    protected static ?string $pluralLabel = 'Статьи';
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


                        Textarea::make('description')->required()->label('SEO Desc')
                            ->autofocus() // Autofocus the field.
                            ->rows(6), // The number of rows tall the textarea is.,

                        Textarea::make('body')->required()->label('Контент')
                            ->autofocus() // Autofocus the field.
                            ->rows(6) // The number of rows tall the textarea is.,
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
                Tables\Columns\TextColumn::make('h1')->label('h1')->sortable(),
                Tables\Columns\TextColumn::make('title')->label('Заголовок')->searchable(['title', 'body', 'h1'])->sortable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->label('Превью'),
                Tables\Columns\TextColumn::make('body')->label('Описание')->limit('15'),
                Tables\Columns\TextColumn::make('description')->label('SEO Desc')->limit('15')

            ])
            ->filters([
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
