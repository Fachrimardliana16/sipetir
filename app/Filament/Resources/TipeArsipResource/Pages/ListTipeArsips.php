<?php

namespace App\Filament\Resources\TipeArsipResource\Pages;

use App\Filament\Resources\TipeArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipeArsips extends ListRecords
{
    protected static string $resource = TipeArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
