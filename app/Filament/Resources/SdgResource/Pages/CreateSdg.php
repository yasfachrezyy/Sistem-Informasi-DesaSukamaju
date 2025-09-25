<?php

namespace App\Filament\Resources\SdgResource\Pages;

use App\Filament\Resources\SdgResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSdg extends CreateRecord
{
    protected static string $resource = SdgResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
