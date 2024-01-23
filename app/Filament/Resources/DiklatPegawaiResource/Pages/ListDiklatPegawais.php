<?php

namespace App\Filament\Resources\DiklatPegawaiResource\Pages;

use App\Filament\Resources\DiklatPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiklatPegawais extends ListRecords
{
    protected static string $resource = DiklatPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
