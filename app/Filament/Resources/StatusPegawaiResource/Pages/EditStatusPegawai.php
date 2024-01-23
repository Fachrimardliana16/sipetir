<?php

namespace App\Filament\Resources\StatusPegawaiResource\Pages;

use App\Filament\Resources\StatusPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusPegawai extends EditRecord
{
    protected static string $resource = StatusPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
