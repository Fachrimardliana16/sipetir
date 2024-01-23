<?php

namespace App\Filament\Resources\PotonganGolonganResource\Pages;

use App\Filament\Resources\PotonganGolonganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPotonganGolongan extends EditRecord
{
    protected static string $resource = PotonganGolonganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
