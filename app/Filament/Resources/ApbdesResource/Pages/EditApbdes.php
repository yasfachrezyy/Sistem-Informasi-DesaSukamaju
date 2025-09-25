<?php

namespace App\Filament\Resources\ApbdesResource\Pages;

use App\Filament\Resources\ApbdesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApbdes extends EditRecord
{
    protected static string $resource = ApbdesResource::class;

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
