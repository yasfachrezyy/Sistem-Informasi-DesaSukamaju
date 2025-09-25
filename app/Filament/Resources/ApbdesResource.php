<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApbdesResource\Pages;
use App\Models\Apbdes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class ApbdesResource extends Resource
{
    protected static ?string $model = Apbdes::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'APBDes (Ringkasan)';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 3;

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
                TextInput::make('total_pendapatan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('total_belanja')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('total_pembiayaan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->searchable()->sortable(),
                TextColumn::make('total_pendapatan')->money('IDR'),
                TextColumn::make('total_belanja')->money('IDR'),
                TextColumn::make('total_pembiayaan')->money('IDR'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApbdes::route('/'),
            'create' => Pages\CreateApbdes::route('/create'),
            'edit' => Pages\EditApbdes::route('/{record}/edit'),
        ];
    }
}
