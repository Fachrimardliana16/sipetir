<?php

namespace App\Filament\Resources\PerjanjianPegawaiResource\Pages;

use App\Filament\Resources\PerjanjianPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerjanjianPegawai extends EditRecord
{
    protected static string $resource = PerjanjianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
