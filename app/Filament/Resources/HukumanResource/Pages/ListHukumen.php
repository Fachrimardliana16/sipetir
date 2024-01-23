<?php

namespace App\Filament\Resources\HukumanResource\Pages;

use App\Filament\Resources\HukumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHukumen extends ListRecords
{
    protected static string $resource = HukumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
