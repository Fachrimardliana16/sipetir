<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TunjanganGolonganResource\Pages;
use App\Filament\Resources\TunjanganGolonganResource\RelationManagers;
use App\Models\TunjanganGolongan;
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

use function Laravel\Prompts\select;

class TunjanganGolonganResource extends Resource
{
    protected static ?string $model = TunjanganGolongan::class;

     protected static ?string $navigationIcon = 'heroicon-o-tag';

     protected static ?string $navigationGroup = "Data Master";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_tunjangan')
                ->relationship('tunjangangolongan', 'name')
                ->label('Tunjangan')
                ->required(),
                Select::make ('id_golongan')
                ->relationship('golongantunjangan', 'name')
                ->label('Golongan')
                ->required(),
                TextInput::make('jumlah')
                ->numeric(),
                TextInput::make('keterangan')
            ])->columns('1');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('tunjangangolongan.name')
                ->label('Tunjangan')
                ->sortable(),
                TextColumn::make ('golongantunjangan.name')
                ->label('Golongan')
                ->sortable(),
                TextColumn::make ('jumlah')
                ->sortable()
                ->money('IDR'),
                TextColumn::make ('keterangan')

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
            'index' => Pages\ListTunjanganGolongans::route('/'),
            'create' => Pages\CreateTunjanganGolongan::route('/create'),
            'edit' => Pages\EditTunjanganGolongan::route('/{record}/edit'),
        ];
    }
}
