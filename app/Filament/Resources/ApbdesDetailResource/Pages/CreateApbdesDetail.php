<?php

namespace App\Filament\Resources\ApbdesDetailResource\Pages;

use App\Filament\Resources\ApbdesDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApbdesDetail extends CreateRecord
{
    protected static string $resource = ApbdesDetailResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
