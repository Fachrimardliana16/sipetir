<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeluargaPegawaiResource\Pages;
use App\Filament\Resources\KeluargaPegawaiResource\RelationManagers;
use App\Models\KeluargaPegawai;
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

class KeluargaPegawaiResource extends Resource
{
    protected static ?string $model = KeluargaPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_data_pegawai,')
                ->relationship('pegawaikeluarga','nama_pegawai')
                ->label('Nama Pegawai')
                ->searchable()
                ->preload()
                ->required(),
                Select::make ('id_keluarga')
                ->relationship('keluargapegawai','name')
                ->label('Status Keluarga')
                ->searchable()
                ->preload()
                ->required(),
                TextInput::make ('nama')
                ->required(),
                TextInput::make ('tempat_lahir')
                ->required(),
                DatePicker::make ('tgl_lahir')
                ->required(),
                Select::make ('jenis_kelamin')
                ->options([
                    'laki-laki' => 'Laki - Laki',
                    'perempuan' => 'Perempuan'
                ])
                ->required(),
                TextInput::make('nik')
                ->label('Nomor Induk Kependudukan')
                ->numeric()
                ->required(),
                TextInput::make('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('pegawaikeluarga.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('keluargapegawai.name')
                 ->label('Status Keluarga')
                 ->sortable()
                 ->searchable(),
                TextColumn::make ('nama')
                 ->label('Nama Keluarga')
                 ->sortable()
                 ->searchable(),
                TextColumn::make ('tempat_lahir')
                 ->label('Tempat Lahir')
                 ->sortable()
                 ->searchable(),
                TextColumn::make ('tgl_lahir') 
                ->label('Tanggal Lahir')
                ->sortable()
                ->searchable(),
                TextColumn::make ('jenis_kelamin')
                 ->label('Jenis Kelamin')
                 ->sortable()
                 ->searchable(),
                TextColumn::make ('nik')
                 ->label('Nomor Induk Kependudukan')
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
            'index' => Pages\ListKeluargaPegawais::route('/'),
            'create' => Pages\CreateKeluargaPegawai::route('/create'),
            'edit' => Pages\EditKeluargaPegawai::route('/{record}/edit'),
        ];
    }
}
