<?php

namespace App\Filament\Resources\HukumanResource\Pages;

use App\Filament\Resources\HukumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHukuman extends EditRecord
{
    protected static string $resource = HukumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
