<?php

namespace App\Filament\Resources\TunjanganGolonganResource\Pages;

use App\Filament\Resources\TunjanganGolonganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTunjanganGolongan extends EditRecord
{
    protected static string $resource = TunjanganGolonganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
