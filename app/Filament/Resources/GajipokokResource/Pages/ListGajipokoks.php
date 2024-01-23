<?php

namespace App\Filament\Resources\GajipokokResource\Pages;

use App\Filament\Resources\GajipokokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGajipokoks extends ListRecords
{
    protected static string $resource = GajipokokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
