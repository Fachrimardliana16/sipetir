<?php

namespace App\Filament\Resources\BagianPegawaiResource\Pages;

use App\Filament\Resources\BagianPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBagianPegawais extends ListRecords
{
    protected static string $resource = BagianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
