<?php

namespace App\Filament\Resources\IjinPegawaiResource\Pages;

use App\Filament\Resources\IjinPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjinPegawais extends ListRecords
{
    protected static string $resource = IjinPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
