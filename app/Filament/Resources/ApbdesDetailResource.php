<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApbdesDetailResource\Pages;
use App\Models\ApbdesDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class ApbdesDetailResource extends Resource
{
    protected static ?string $model = ApbdesDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'APBDes Detail';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('apbdes_id')
                    ->relationship('apbdes', 'tahun')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Tahun Anggaran'),
                Select::make('tipe')
                    ->options([
                        'pendapatan' => 'Pendapatan',
                        'belanja' => 'Belanja',
                        'pembiayaan' => 'Pembiayaan',
                    ])
                    ->required(),
                TextInput::make('kategori')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Contoh: Dana Desa, Belanja Pegawai, Siltap Kades'),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('apbdes.tahun')->label('Tahun')->sortable(),
                TextColumn::make('tipe')->searchable()->badge(),
                TextColumn::make('kategori')->searchable(),
                TextColumn::make('jumlah')->money('IDR'),
            ])
            ->defaultSort('apbdes.tahun', 'desc')
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
            'index' => Pages\ListApbdesDetails::route('/'),
            'create' => Pages\CreateApbdesDetail::route('/create'),
            'edit' => Pages\EditApbdesDetail::route('/{record}/edit'),
        ];
    }
}
