<?php

namespace App\Filament\Resources\StuntingResource\Pages;

use App\Filament\Resources\StuntingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStunting extends EditRecord
{
    protected static string $resource = StuntingResource::class;

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
