<?php

namespace App\Filament\Resources\DiklatPegawaiResource\Pages;

use App\Filament\Resources\DiklatPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiklatPegawai extends EditRecord
{
    protected static string $resource = DiklatPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
