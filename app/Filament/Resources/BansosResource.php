<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BansosResource\Pages;
use App\Models\Bansos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class BansosResource extends Resource
{
    protected static ?string $model = Bansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = 'Bansos (Ringkasan)';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y')),
                TextInput::make('jenis_bansos')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Contoh: BPNT, PKH, BLT-DD, BPJS PBI'),
                TextInput::make('jumlah_penerima')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->sortable(),
                TextColumn::make('jenis_bansos')->searchable(),
                TextColumn::make('jumlah_penerima'),
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
            'index' => Pages\ListBansos::route('/'),
            'create' => Pages\CreateBansos::route('/create'),
            'edit' => Pages\EditBansos::route('/{record}/edit'),
        ];
    }
}
