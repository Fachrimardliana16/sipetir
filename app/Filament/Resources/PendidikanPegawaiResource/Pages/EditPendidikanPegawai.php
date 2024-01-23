<?php

namespace App\Filament\Resources\PendidikanPegawaiResource\Pages;

use App\Filament\Resources\PendidikanPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendidikanPegawai extends EditRecord
{
    protected static string $resource = PendidikanPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
