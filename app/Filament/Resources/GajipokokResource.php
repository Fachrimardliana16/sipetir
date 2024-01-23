<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GajipokokResource\Pages;
use App\Filament\Resources\GajipokokResource\RelationManagers;
use App\Models\Gajipokok;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GajipokokResource extends Resource
{
    protected static ?string $model = Gajipokok::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = "Data Master";

     protected static ?string $label = "Gaji Pokok";

   public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make ('name') 
                ->label("Jumlah Gaji Pokok")
                ->required(),
                 Select::make ('id_golongan')
                 ->label('Golongan')
                 ->relationship('Golongan', 'name')
                 ->required(),
                TextInput::make ('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                  TextColumn::make('golongan.name')
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('name')
                 ->label("Gaji Pokok")
                 ->sortable()
                 ->searchable()
                 ->money('IDR'),
                TextColumn::make('keterangan')
                 ->sortable()
                 ->searchable(),
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
            'index' => Pages\ListGajipokoks::route('/'),
            'create' => Pages\CreateGajipokok::route('/create'),
            'edit' => Pages\EditGajipokok::route('/{record}/edit'),
        ];
    }
}
