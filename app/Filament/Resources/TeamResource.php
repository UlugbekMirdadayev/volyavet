<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\Team;
use App\Services\BranchService;
use App\Traits\BranchTrait;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TeamResource extends Resource
{
    use BranchTrait;

    protected static ?string $model = Team::class;
    protected static ?string $navigationLabel = 'Команда';
    protected static ?string $breadcrumb = 'Команда';
    protected static ?string $label = 'Команда';
    protected static ?string $pluralLabel = 'Команда';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')->label('Имя Ф.')
                        ->required()
                        ->maxLength(2048),

                    Textarea::make('body')->required()->label('Описание 1')
                        ->autofocus() // Autofocus the field.
                        ->rows(3), // The number of rows tall the textarea is.,

                    Textarea::make('description')->required()->label('Описание')
                        ->autofocus() // Autofocus the field.
                        ->rows(6), // The number of rows tall the textarea is.,

                    TextInput::make('exp')->required()->placeholder('5+ лет')->label('Стаж работы'),

                    Forms\Components\Hidden::make('branch_id')->required()->default(BranchService::current()->id),

                    SpatieMediaLibraryFileUpload::make('image')->label('Фото')->required()->image(),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Имя Ф.'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->label('Фото'),
                Tables\Columns\TextColumn::make('body')->limit(15)->label('Описание 1'),
                Tables\Columns\TextColumn::make('description')->limit(15)->label('Описание'),
                Tables\Columns\TextColumn::make('exp')->label('Опыт'),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
