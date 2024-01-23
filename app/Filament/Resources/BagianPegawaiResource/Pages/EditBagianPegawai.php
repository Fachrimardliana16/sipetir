<?php

namespace App\Filament\Resources\BagianPegawaiResource\Pages;

use App\Filament\Resources\BagianPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBagianPegawai extends EditRecord
{
    protected static string $resource = BagianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
