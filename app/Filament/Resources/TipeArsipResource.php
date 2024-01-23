<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipeArsipResource\Pages;
use App\Filament\Resources\TipeArsipResource\RelationManagers;
use App\Models\TipeArsip;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipeArsipResource extends Resource
{
    protected static ?string $model = TipeArsip::class;

     protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

     protected static ?string $navigationGroup = "Data Master";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make ('name')
                ->label('Tipe Arsip')
                ->required(),
                TextInput::make ('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('name')
                ->label('Tipe Arsip')
                ->sortable()
                ->searchable(),
                TextColumn::make ('keterangan')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipeArsips::route('/'),
            'create' => Pages\CreateTipeArsip::route('/create'),
            'edit' => Pages\EditTipeArsip::route('/{record}/edit'),
        ];
    }
}
