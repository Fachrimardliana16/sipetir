<?php

namespace App\Filament\Resources\PerjanjianPegawaiResource\Pages;

use App\Filament\Resources\PerjanjianPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerjanjianPegawais extends ListRecords
{
    protected static string $resource = PerjanjianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            
        ];
    }
}
