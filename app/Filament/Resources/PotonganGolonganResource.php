<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PotonganGolonganResource\Pages;
use App\Filament\Resources\PotonganGolonganResource\RelationManagers;
use App\Models\PotonganGolongan;
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

class PotonganGolonganResource extends Resource
{
    protected static ?string $model = PotonganGolongan::class;

     protected static ?string $navigationIcon = 'heroicon-o-folder-open';

     protected static ?string $navigationGroup = "Data Master";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Select::make ('id_potongan')
                 ->label('Potongan')
                 ->relationship('potongangolongan', 'name')
                 ->required(),
                  Select::make ('id_golongan')
                  ->label('Golongan')
                  ->relationship('golonganpotongan', 'name')
                  ->required(),
                  TextInput::make('jumlah')
                  ->numeric()
                  ->label('Jumlah Potongan'),
                  TextInput::make('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('golonganpotongan.name')
              ->sortable()
              ->searchable()
              ->label('Golongan'),
              TextColumn::make('potongangolongan.name')
              ->sortable()
              ->searchable()
               ->label('Potongan'),
              TextColumn::make('jumlah')
              ->sortable()
              ->searchable()
              ->label('Jumlah Potongan')
              ->money('IDR'),
              TextColumn::make('keterangan')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPotonganGolongans::route('/'),
            'create' => Pages\CreatePotonganGolongan::route('/create'),
            'edit' => Pages\EditPotonganGolongan::route('/{record}/edit'),
        ];
    }
}
