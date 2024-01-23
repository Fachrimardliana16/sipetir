<?php

namespace App\Filament\Resources\GolonganPegawaiResource\Pages;

use App\Filament\Resources\GolonganPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGolonganPegawai extends EditRecord
{
    protected static string $resource = GolonganPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
