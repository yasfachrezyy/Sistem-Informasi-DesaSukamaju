<?php

namespace App\Filament\Resources\DemografiResource\Pages;

use App\Filament\Resources\DemografiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDemografi extends CreateRecord
{
    protected static string $resource = DemografiResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
