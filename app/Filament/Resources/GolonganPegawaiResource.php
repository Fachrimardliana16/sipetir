<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GolonganPegawaiResource\Pages;
use App\Filament\Resources\GolonganPegawaiResource\RelationManagers;
use App\Models\GolonganPegawai;
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

class GolonganPegawaiResource extends Resource
{
    protected static ?string $model = GolonganPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Select::make ('id_data_pegawai')
                 ->relationship('pegawaigolongan', 'nama_pegawai')
                 ->label('Nama Pegawai')
                 ->preload()
                 ->searchable()
                 ->required(),
                Select::make ('id_golongan')
                ->relationship('golonganpegawai','name')
                ->label('Golongan')
                ->required(),
                TextInput::make ('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('pegawaigolongan.nama_pegawai') 
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('golonganpegawai.name')
                ->label('Golongan Pegawai')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListGolonganPegawais::route('/'),
            'create' => Pages\CreateGolonganPegawai::route('/create'),
            'edit' => Pages\EditGolonganPegawai::route('/{record}/edit'),
        ];
    }
}
