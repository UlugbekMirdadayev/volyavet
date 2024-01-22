<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages\CreateBranch;
use App\Filament\Resources\BranchResource\Pages\EditBranch;
use App\Filament\Resources\BranchResource\Pages\ListBranch;
use App\Models\Branch;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationLabel = 'Филиалы';
    protected static ?string $breadcrumb = 'Филиалы';
    protected static ?string $label = 'Филиалы';
    protected static ?string $pluralLabel = 'Филиалы';

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Филиалы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Название')
                            ->maxLength(128),

                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->label('Адрес')
                            ->maxLength(256),

                        Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->maxLength(20),

                        Forms\Components\TextInput::make('work_time')
                            ->label('Время работы')
                            ->maxLength(64),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->maxLength(128)
                            ->type('email'),

                        Forms\Components\TextInput::make('metro')
                            ->label('Метро')
                            ->maxLength(128),

                        Forms\Components\TextInput::make('lat')
                                                    ->label('Широта'),

                        Forms\Components\TextInput::make('long')
                            ->label('Долгота'),

                        Forms\Components\TextInput::make('telegram')
                            ->label('Telegram')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('viber')
                            ->label('Viber')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('whats_up')
                            ->label('WhatsUp')
                            ->maxLength(255),

                        Forms\Components\Checkbox::make('is_active')->label('Активен'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),

                Tables\Columns\TextColumn::make('address')
                    ->label('Адрес')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('metro')
                    ->label('Метро')
                    ->searchable(),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Активен')
                    ->searchable(),

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

    public static function getPages(): array
    {
        return [
            'index' => ListBranch::route('/'),
            'create' => CreateBranch::route('/create'),
            'edit' => EditBranch::route('/{record}/edit'),
        ];
    }
}
