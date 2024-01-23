<?php

namespace App\Filament\Resources\PendidikanPegawaiResource\Pages;

use App\Filament\Resources\PendidikanPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendidikanPegawais extends ListRecords
{
    protected static string $resource = PendidikanPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
