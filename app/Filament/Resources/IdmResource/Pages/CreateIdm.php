<?php

namespace App\Filament\Resources\IdmResource\Pages;

use App\Filament\Resources\IdmResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIdm extends CreateRecord
{
    protected static string $resource = IdmResource::class;

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
