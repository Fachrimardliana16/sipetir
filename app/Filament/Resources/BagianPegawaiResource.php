<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BagianPegawaiResource\Pages;
use App\Filament\Resources\BagianPegawaiResource\RelationManagers;
use App\Models\BagianPegawai;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BagianPegawaiResource extends Resource
{
    protected static ?string $model = BagianPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_data_pegawai')
                ->options(Pegawai::all()->pluck('nama_pegawai', 'id'))
                ->relationship('pegawaibagian', 'nama_pegawai')
                ->label('Pegawai')
                ->searchable()
                ->preload()
                ->required(),
                Select::make ('id_bagian')
                ->relationship('bagianpegawai', 'name')
                ->label('Bagian')
                ->required(),
                DatePicker::make ('tgl_masuk_bagian')
                ->label('Tangggal Masuk Bagian')
                ->required(),
                TextInput::make ('keterangan')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawaibagian.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make('bagianpegawai.name')
                ->label('Bagian')
                ->sortable()
                ->searchable(),
                TextColumn::make('tgl_masuk_bagian')
                 ->label('Tangggal Masuk Bagian')
                ->sortable(),
                TextColumn::make('keterangan')
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
            'index' => Pages\ListBagianPegawais::route('/'),
            'create' => Pages\CreateBagianPegawai::route('/create'),
            'edit' => Pages\EditBagianPegawai::route('/{record}/edit'),
        ];
    }
}
