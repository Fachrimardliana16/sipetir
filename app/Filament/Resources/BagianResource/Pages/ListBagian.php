<?php

namespace App\Filament\Resources\BagianResource\Pages;

use App\Filament\Resources\BagianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBagian extends ListRecords
{
    protected static string $resource = BagianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
