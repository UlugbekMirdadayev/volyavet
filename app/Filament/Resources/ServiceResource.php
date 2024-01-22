<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Category;
use App\Models\Service;
use App\Services\BranchService;
use App\Traits\BranchTrait;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    use BranchTrait;

    protected static ?string $model = Service::class;
    protected static ?string $navigationGroup = 'Услуги';

    protected static ?string $navigationLabel = 'Услуги';
    protected static ?string $breadcrumb = 'Услуги';
    protected static ?string $label = 'Услуги';
    protected static ?string $pluralLabel = 'Услуги';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Grid::make(['lg' => 2,])->schema([
                        Forms\Components\Textarea::make('title')->label('Заголовок')->required(),
                        Forms\Components\Select::make('categories_id')->label("Категория")
                            ->options(Category::pluck('title', 'id'))->required(),

                        Forms\Components\TextInput::make('price')->label('Цена, ₽')->type('number')->required(),

                        Forms\Components\Checkbox::make('is_active')->label('Активна'),

                        Forms\Components\Hidden::make('branch_id')->required()->default(BranchService::current()->id),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title')->searchable(),
                TextColumn::make('categories_id')->searchable(),
                Tables\Columns\TextColumn::make('price')->label('Цена, ₽')->suffix(' ₽'),
                Tables\Columns\BooleanColumn::make('is_active')->label('Активна')
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
