<?php

namespace App\Filament\Resources\ApbdesDetailResource\Pages;

use App\Filament\Resources\ApbdesDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApbdesDetail extends EditRecord
{
    protected static string $resource = ApbdesDetailResource::class;

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
