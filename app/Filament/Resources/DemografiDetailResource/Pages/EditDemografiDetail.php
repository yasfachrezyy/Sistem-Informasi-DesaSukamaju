<?php

namespace App\Filament\Resources\DemografiDetailResource\Pages;

use App\Filament\Resources\DemografiDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemografiDetail extends EditRecord
{
    protected static string $resource = DemografiDetailResource::class;

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
