<?php

namespace App\Filament\Resources\TitikPentingResource\Pages;

use App\Filament\Resources\TitikPentingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTitikPenting extends EditRecord
{
    protected static string $resource = TitikPentingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
