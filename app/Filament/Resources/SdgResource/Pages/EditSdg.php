<?php

namespace App\Filament\Resources\SdgResource\Pages;

use App\Filament\Resources\SdgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdg extends EditRecord
{
    protected static string $resource = SdgResource::class;

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
