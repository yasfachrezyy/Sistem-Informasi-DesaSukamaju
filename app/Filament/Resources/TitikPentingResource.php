<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TitikPentingResource\Pages;
use App\Models\TitikPenting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// Hapus semua 'use' statement dari plugin peta
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class TitikPentingResource extends Resource
{
    protected static ?string $model = TitikPenting::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = 'Peta Desa';
    protected static ?string $navigationGroup = 'Konten Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->columnSpanFull(),
                Select::make('kategori')->options([
                    'pemerintahan' => 'Pemerintahan',
                    'ibadah' => 'Tempat Ibadah',
                    'umkm' => 'UMKM',
                    'pendidikan' => 'Pendidikan',
                    'kesehatan' => 'Kesehatan',
                    'wisata' => 'Wisata',
                ]),
                FileUpload::make('foto')->image()->disk('public')->directory('peta-poi'),
                Textarea::make('deskripsi')->columnSpanFull(),

                // Ganti peta dengan input teks manual
                TextInput::make('latitude')
                    ->required()
                    ->numeric()
                    ->helperText('Dapatkan dari klik kanan di Google Maps.'),
                TextInput::make('longitude')
                    ->required()
                    ->numeric()
                    ->helperText('Dapatkan dari klik kanan di Google Maps.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto'),
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('kategori')->searchable()->badge(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTitikPentings::route('/'),
            'create' => Pages\CreateTitikPenting::route('/create'),
            'edit' => Pages\EditTitikPenting::route('/{record}/edit'),
        ];
    }
}