<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubbagianResource\Pages;
use App\Filament\Resources\SubbagianResource\RelationManagers;
use App\Models\Subbagian;
use Faker\Provider\ar_EG\Text;
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

class SubbagianResource extends Resource
{
    protected static ?string $model = Subbagian::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = "Data Master";

     protected static ?string $label = "Sub Bagian";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make ('name') ->required(),
                 Select::make ('id_bagian')
                 ->label('Bagian')
                 ->relationship('bagian', 'name')
                 ->required(),
                Select::make ('keterangan')->options([
                    'pusat' => 'Pusat',
                    'cabang' => 'Cabng',
                    'unit' => 'Unit'
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                 ->sortable()
                 ->searchable(),
                  TextColumn::make('bagian.name')
                  ->sortable()
                  ->searchable(),
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
            'index' => Pages\ListSubbagians::route('/'),
            'create' => Pages\CreateSubbagian::route('/create'),
            'edit' => Pages\EditSubbagian::route('/{record}/edit'),
        ];
    }
}
