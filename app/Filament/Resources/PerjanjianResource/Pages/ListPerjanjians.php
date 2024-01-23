<?php

namespace App\Filament\Resources\PerjanjianResource\Pages;

use App\Filament\Resources\PerjanjianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerjanjians extends ListRecords
{
    protected static string $resource = PerjanjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
