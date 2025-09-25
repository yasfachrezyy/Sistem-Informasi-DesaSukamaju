<?php
namespace App\Filament\Resources;

use App\Filament\Resources\DemografiDetailResource\Pages;
use App\Models\DemografiDetail;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DemografiDetailResource extends Resource
{
    protected static ?string $model = DemografiDetail::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationLabel = 'Demografi Detail';
    protected static ?string $navigationGroup = 'Infografis Desa';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('tahun')->required()->numeric()->minValue(2000)->maxValue(date('Y')),
            Select::make('tipe')->options([
                'umur' => 'Kelompok Umur',
                'pendidikan' => 'Pendidikan',
                'pekerjaan' => 'Pekerjaan',
                'agama' => 'Agama',
                'perkawinan' => 'Status Perkawinan',
                'dusun' => 'Dusun',
            ])->required(),
            TextInput::make('kategori')->required()->helperText('Contoh: 0-5 Tahun, SD/MI, Petani, Islam, Belum Kawin, Dusun 1'),
            TextInput::make('jumlah')->required()->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('tahun')->sortable(),
            TextColumn::make('tipe')->searchable(),
            TextColumn::make('kategori')->searchable(),
            TextColumn::make('jumlah'),
        ])->defaultSort('tahun', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemografiDetails::route('/'),
            'create' => Pages\CreateDemografiDetail::route('/create'),
            'edit' => Pages\EditDemografiDetail::route('/{record}/edit'),
        ];
    }
}
