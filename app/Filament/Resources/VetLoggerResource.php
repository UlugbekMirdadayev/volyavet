<?php

namespace App\Filament\Resources;

use App\Enums\PetSexStatusEnum;
use App\Filament\Resources\VetLoggerResource\Pages;
use App\Models\Pet;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VetLoggerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'VetLogger';
    protected static ?string $breadcrumb = 'VetLogger';
    protected static ?string $label = 'VetLogger';
    protected static ?string $pluralLabel = 'VetLogger';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'name';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    Forms\Components\Grid::make(['lg' => 3, 'md' => 2])->schema([
                        TextInput::make('last_name')->label('Фамилия')->required(),
                        TextInput::make('name')->label('Имя')->required(),
                        TextInput::make('middle_name')->label('Отчество'),
                        TextInput::make('crm_user_id')->type('number')->label('№ - ID VetManager')->required(),
                        TextInput::make('mobile_number')->label('Телефон')->type('number')->required(),
                        TextInput::make('email')->type('email')->label('Почта')->required(),
                    ]),
                    Forms\Components\Grid::make(['lg' => 3, 'md' => 2])->schema([
                        DateTimePicker::make('mobile_verified_at')->label('Дата подтверждения телефона'),
                        Select::make('acceptMail')->boolean()->label('Рассылка писем'),
                    ]),


                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('crm_user_id')->label('№')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('full_name')->label('ФИО')->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->where('name','LIKE','%'.$search.'%')
                        ->orWhere('last_name','LIKE','%'.$search.'%')
                        ->orWhere('middle_name','LIKE','%'.$search.'%');
                }),
                Tables\Columns\TextColumn::make('pets.nickname')->label('Питомцы')->searchable(),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('mobile_verified_at')->label('Верифицированные')
            ])
            ->actions([
                DeleteAction::make(),
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
            'index' => Pages\ListVetLoggers::route('/'),
            'create' => Pages\CreateVetLogger::route('/create'),
            'edit' => Pages\EditVetLogger::route('/{record}/edit'),
        ];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Фамилия' => $record->last_name,
            'Имя' => $record->name,
            'Отчество' => $record->middle_name
        ];
    }
}
