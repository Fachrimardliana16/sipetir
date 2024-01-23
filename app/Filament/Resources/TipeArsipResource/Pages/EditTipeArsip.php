<?php

namespace App\Filament\Resources\TipeArsipResource\Pages;

use App\Filament\Resources\TipeArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipeArsip extends EditRecord
{
    protected static string $resource = TipeArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
