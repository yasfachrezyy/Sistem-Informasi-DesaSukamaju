<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdmResource\Pages;
use App\Models\Idm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class IdmResource extends Resource
{
    protected static ?string $model = Idm::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $navigationLabel = 'IDM';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 8;

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
                TextInput::make('status_idm')
                    ->required()
                    ->helperText('Contoh: Mandiri, Maju, Berkembang'),
                TextInput::make('skor_idm')
                    ->required()
                    ->numeric()
                    ->rules(['regex:/^\d{1,1}(\.\d{1,4})?$/'])
                    ->helperText('Gunakan titik sebagai koma, contoh: 0.7812'),
                TextInput::make('skor_iks')
                    ->required()
                    ->numeric()
                    ->rules(['regex:/^\d{1,1}(\.\d{1,4})?$/']),
                TextInput::make('skor_ike')
                    ->required()
                    ->numeric()
                    ->rules(['regex:/^\d{1,1}(\.\d{1,4})?$/']),
                TextInput::make('skor_ikl')
                    ->required()
                    ->numeric()
                    ->rules(['regex:/^\d{1,1}(\.\d{1,4})?$/']),
                Textarea::make('indikator')
                    ->helperText('Anda bisa memasukkan data tabel indikator di sini dalam format teks sederhana.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->searchable()->sortable(),
                TextColumn::make('status_idm')->badge(),
                TextColumn::make('skor_idm'),
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
            'index' => Pages\ListIdms::route('/'),
            'create' => Pages\CreateIdm::route('/create'),
            'edit' => Pages\EditIdm::route('/{record}/edit'),
        ];
    }
}
