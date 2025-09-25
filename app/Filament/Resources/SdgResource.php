<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SdgResource\Pages;
use App\Models\Sdg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class SdgResource extends Resource
{
    protected static ?string $model = Sdg::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'SDGs';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Utama')
                    ->schema([
                        TextInput::make('tahun')
                            ->required()
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(date('Y'))
                            ->unique(ignoreRecord: true),
                        TextInput::make('skor_total')
                            ->required()
                            ->numeric()
                            ->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/'])
                            ->helperText('Contoh: 78.1234'),
                    ]),
                Section::make('Rincian Skor SDGs Desa')
                    ->description('Masukkan skor untuk masing-masing pilar SDGs. Gunakan titik sebagai koma.')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('desa_tanpa_kemiskinan')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_tanpa_kelaparan')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_sehat_sejahtera')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('pendidikan_desa_berkualitas')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('keterlibatan_perempuan_desa')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_layak_air_bersih')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_berenergi_bersih')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('pertumbuhan_ekonomi_merata')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('infrastruktur_inovasi')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_tanpa_kesenjangan')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('kawasan_pemukiman_aman')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('konsumsi_produksi_sadar_lingkungan')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_tanggap_perubahan_iklim')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_peduli_lingkungan_laut')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_peduli_lingkungan_darat')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('desa_damai_berkeadilan')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('kemitraan_pembangunan_desa')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                                TextInput::make('kelembagaan_desa_dinamis')->numeric()->rules(['regex:/^\d{1,2}(\.\d{1,4})?$/']),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->searchable()->sortable(),
                TextColumn::make('skor_total'),
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
            'index' => Pages\ListSdgs::route('/'),
            'create' => Pages\CreateSdg::route('/create'),
            'edit' => Pages\EditSdg::route('/{record}/edit'),
        ];
    }
}
