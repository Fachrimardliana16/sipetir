<?php

namespace App\Filament\Resources\JabatanPegawaiResource\Pages;

use App\Filament\Resources\JabatanPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJabatanPegawai extends EditRecord
{
    protected static string $resource = JabatanPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
