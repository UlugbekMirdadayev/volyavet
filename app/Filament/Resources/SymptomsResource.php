<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SymptomsResource\Pages;
use App\Models\Symptom;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SymptomsResource extends Resource
{
    protected static ?string $model = Symptom::class;
    protected static ?string $navigationLabel = 'Симптомы';
    protected static ?string $breadcrumb = 'Симптомы';
    protected static ?string $pluralLabel = 'Симптомы';

    protected static ?string $label = 'Симптомы';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    Forms\Components\Grid::make(['lg' => 2,])->schema([
                        Forms\Components\Textarea::make('title')->label('Заголовок')->required(),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title')->searchable()->label('Заголовок')
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
            'index' => Pages\ListSymptoms::route('/'),
            'create' => Pages\CreateSymptoms::route('/create'),
            'edit' => Pages\EditSymptoms::route('/{record}/edit'),
        ];
    }
}
