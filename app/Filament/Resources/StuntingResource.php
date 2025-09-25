<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StuntingResource\Pages;
use App\Models\Stunting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class StuntingResource extends Resource
{
    protected static ?string $model = Stunting::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-minus';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y'))
                    ->unique(ignoreRecord: true),
                TextInput::make('jumlah_kasus')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Kasus Stunting'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->searchable()->sortable(),
                TextColumn::make('jumlah_kasus'),
            ])
            ->defaultSort('tahun', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStuntings::route('/'),
            'create' => Pages\CreateStunting::route('/create'),
            'edit' => Pages\EditStunting::route('/{record}/edit'),
        ];
    }
}
