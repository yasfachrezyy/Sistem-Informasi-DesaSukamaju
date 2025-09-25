<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Manajemen UMKM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('umkm_id')
                    ->relationship('umkm', 'nama_umkm')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Pemilik UMKM'),
                Forms\Components\TextInput::make('nama_produk')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true) // <-- Jalankan aksi saat kursor keluar
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))), // <-- Buat slug otomatis
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly()
                    ->helperText('Slug dibuat otomatis berdasarkan nama produk.'),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\TextInput::make('kategori')
                    ->helperText('Contoh: Makanan, Kerajinan, Jasa, dll.'),
                Forms\Components\RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar_produk')
                    ->image()
                    ->disk('public')
                    ->directory('produk-images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_produk')->label('Gambar'),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable(),
                // Menampilkan nama UMKM dari relasi
                Tables\Columns\TextColumn::make('umkm.nama_umkm')
                    ->label('Pemilik UMKM')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->badge()
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
