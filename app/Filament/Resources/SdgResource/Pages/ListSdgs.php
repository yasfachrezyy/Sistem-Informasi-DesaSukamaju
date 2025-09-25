<?php

namespace App\Filament\Resources\SdgResource\Pages;

use App\Filament\Resources\SdgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdgs extends ListRecords
{
    protected static string $resource = SdgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
