<?php

namespace App\Filament\Resources\ApbdesResource\Pages;

use App\Filament\Resources\ApbdesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApbdes extends CreateRecord
{
    protected static string $resource = ApbdesResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
