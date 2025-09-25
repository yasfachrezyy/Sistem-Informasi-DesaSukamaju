<?php

namespace App\Filament\Resources\ApbdesDetailResource\Pages;

use App\Filament\Resources\ApbdesDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApbdesDetails extends ListRecords
{
    protected static string $resource = ApbdesDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
