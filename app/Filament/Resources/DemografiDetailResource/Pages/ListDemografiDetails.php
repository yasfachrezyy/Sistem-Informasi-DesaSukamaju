<?php

namespace App\Filament\Resources\DemografiDetailResource\Pages;

use App\Filament\Resources\DemografiDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemografiDetails extends ListRecords
{
    protected static string $resource = DemografiDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
