<?php

namespace App\Filament\Resources\TitikPentingResource\Pages;

use App\Filament\Resources\TitikPentingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTitikPentings extends ListRecords
{
    protected static string $resource = TitikPentingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
