<?php

namespace App\Filament\Resources\TunjanganGolonganResource\Pages;

use App\Filament\Resources\TunjanganGolonganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTunjanganGolongans extends ListRecords
{
    protected static string $resource = TunjanganGolonganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
