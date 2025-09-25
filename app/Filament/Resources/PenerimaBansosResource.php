<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaBansosResource\Pages;
use App\Models\PenerimaBansos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PenerimaBansosResource extends Resource
{
    protected static ?string $model = PenerimaBansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'Database Penerima Bansos';

    protected static ?string $navigationGroup = 'Infografis Desa';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nik')
                    ->required()
                    ->numeric()
                    ->unique(ignoreRecord: true)
                    ->minLength(16)
                    ->maxLength(16),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')->searchable(),
                TextColumn::make('nama')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPenerimaBansos::route('/'),
            'create' => Pages\CreatePenerimaBansos::route('/create'),
            'edit' => Pages\EditPenerimaBansos::route('/{record}/edit'),
        ];
    }
}
