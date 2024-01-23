<?php

namespace App\Filament\Resources\ArsipPegawaiResource\Pages;

use App\Filament\Resources\ArsipPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipPegawai extends EditRecord
{
    protected static string $resource = ArsipPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
