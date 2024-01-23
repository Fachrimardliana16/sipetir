<?php

namespace App\Filament\Resources\JabatanPegawaiResource\Pages;

use App\Filament\Resources\JabatanPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJabatanPegawais extends ListRecords
{
    protected static string $resource = JabatanPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
