<?php

namespace App\Filament\Resources\DemografiDetailResource\Pages;

use App\Filament\Resources\DemografiDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDemografiDetail extends CreateRecord
{
    protected static string $resource = DemografiDetailResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
