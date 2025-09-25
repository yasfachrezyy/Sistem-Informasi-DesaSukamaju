<?php

namespace App\Filament\Resources\DemografiResource\Pages;

use App\Filament\Resources\DemografiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemografis extends ListRecords
{
    protected static string $resource = DemografiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
