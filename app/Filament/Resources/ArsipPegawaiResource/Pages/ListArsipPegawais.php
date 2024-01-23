<?php

namespace App\Filament\Resources\ArsipPegawaiResource\Pages;

use App\Filament\Resources\ArsipPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArsipPegawais extends ListRecords
{
    protected static string $resource = ArsipPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
