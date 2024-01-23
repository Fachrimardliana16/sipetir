<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HukumanResource\Pages;
use App\Filament\Resources\HukumanResource\RelationManagers;
use App\Models\Hukuman;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HukumanResource extends Resource
{
    protected static ?string $model = Hukuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    protected static ?string $navigationGroup = "Data Master";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Hukuman')
                ->required(),
                TextInput::make('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Hukuman')
                ->sortable()
                ->searchable(),
                TextColumn::make('keterangan')
                ->sortable()
                ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListHukumen::route('/'),
            'create' => Pages\CreateHukuman::route('/create'),
            'edit' => Pages\EditHukuman::route('/{record}/edit'),
        ];
    }
}
