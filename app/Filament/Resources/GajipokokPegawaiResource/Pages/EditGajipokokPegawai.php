<?php

namespace App\Filament\Resources\GajipokokPegawaiResource\Pages;

use App\Filament\Resources\GajipokokPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGajipokokPegawai extends EditRecord
{
    protected static string $resource = GajipokokPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
