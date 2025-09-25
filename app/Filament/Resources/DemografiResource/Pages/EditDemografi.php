<?php

namespace App\Filament\Resources\DemografiResource\Pages;

use App\Filament\Resources\DemografiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemografi extends EditRecord
{
    protected static string $resource = DemografiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Kembali ke index jika telah selesai menambahkan data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
