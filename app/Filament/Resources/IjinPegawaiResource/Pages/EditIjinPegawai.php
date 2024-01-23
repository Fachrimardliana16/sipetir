<?php

namespace App\Filament\Resources\IjinPegawaiResource\Pages;

use App\Filament\Resources\IjinPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIjinPegawai extends EditRecord
{
    protected static string $resource = IjinPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
