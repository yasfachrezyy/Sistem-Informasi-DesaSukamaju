<?php

namespace App\Filament\Resources\PenerimaBansosResource\Pages;

use App\Filament\Resources\PenerimaBansosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenerimaBansos extends CreateRecord
{
    protected static string $resource = PenerimaBansosResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
