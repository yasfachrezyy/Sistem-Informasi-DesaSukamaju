<?php
namespace App\Filament\Resources;

use App\Filament\Resources\DemografiResource\Pages;
use App\Models\Demografi;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DemografiResource extends Resource
{
    protected static ?string $model = Demografi::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Infografis Desa';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('tahun')->required()->numeric()->minValue(2000)->maxValue(date('Y')),
            TextInput::make('total_penduduk')->required()->numeric(),
            TextInput::make('total_kepala_keluarga')->required()->numeric(),
            TextInput::make('total_perempuan')->required()->numeric(),
            TextInput::make('total_laki_laki')->required()->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('tahun')->searchable()->sortable(),
            TextColumn::make('total_penduduk'),
            TextColumn::make('total_kepala_keluarga'),
        ])->defaultSort('tahun', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemografis::route('/'),
            'create' => Pages\CreateDemografi::route('/create'),
            'edit' => Pages\EditDemografi::route('/{record}/edit'),
        ];
    }
}
