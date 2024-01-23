<?php

namespace App\Filament\Resources\StatusPegawaiResource\Pages;

use App\Filament\Resources\StatusPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusPegawais extends ListRecords
{
    protected static string $resource = StatusPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
