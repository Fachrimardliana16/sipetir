<?php

namespace App\Filament\Resources\KeluargaPegawaiResource\Pages;

use App\Filament\Resources\KeluargaPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeluargaPegawais extends ListRecords
{
    protected static string $resource = KeluargaPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
