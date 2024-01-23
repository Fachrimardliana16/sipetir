<?php

namespace App\Filament\Resources\GolonganPegawaiResource\Pages;

use App\Filament\Resources\GolonganPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGolonganPegawais extends ListRecords
{
    protected static string $resource = GolonganPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
