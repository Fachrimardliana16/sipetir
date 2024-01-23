<?php

namespace App\Filament\Resources\PerjanjianResource\Pages;

use App\Filament\Resources\PerjanjianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerjanjian extends EditRecord
{
    protected static string $resource = PerjanjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
