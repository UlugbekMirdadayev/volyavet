<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackResource\Pages;
use App\Models\Callback;
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

class CallbackResource extends Resource
{
    use BranchTrait;

    protected static ?string $model = CallBack::class;
    protected static ?string $pluralLabel = 'Заявки';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Grid::make(['lg' => 2,])->schema([
                        Forms\Components\TextInput::make('name')->label('Имя')->required(),
                        Forms\Components\TextInput::make('phone')->label('Телефон')->type('tel')->required(),
                        Forms\Components\Textarea::make('message')->label('Сообщение')->required(),
                        Forms\Components\Hidden::make('branch_id')->required()->default(BranchService::current()->id)
                    ]),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->label('Имя')->searchable()->sortable(),
                TextColumn::make('phone')->label("Телефон")->searchable()->sortable(),
                TextColumn::make('message')->label('Сообщение')->limit(25)->searchable()->sortable(),
                TextColumn::make('created_at')->label('Дата')
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

    public static function getEloquentQuery(): Builder
    {
        $branch = BranchService::current();

        if ($branch)
            return parent::getEloquentQuery()->where('branch_id', $branch->id)->latest();

        return parent::getEloquentQuery()->latest();
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
            'index' => Pages\ListCallbacks::route('/'),
            'create' => Pages\CreateCallback::route('/create'),
            'edit' => Pages\EditCallback::route('/{record}/edit'),
        ];
    }
}
