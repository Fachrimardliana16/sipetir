<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JabatanPegawaiResource\Pages;
use App\Filament\Resources\JabatanPegawaiResource\RelationManagers;
use App\Models\JabatanPegawai;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanPegawaiResource extends Resource
{
    protected static ?string $model = JabatanPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = "Data Pegawai";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_data_pegawai')
                ->relationship('pegawaijabatan', 'nama_pegawai')
                ->label('Pegawai')
                ->searchable()
                ->preload()
                ->required(),
                Select::make ('id_jabatan')
                ->relationship('jabatanpegawai', 'nama')
                ->label('Jabatan')
                ->required(),
                 Select::make ('id_bagian')
                 ->relationship('bagianjabatan', 'name')
                 ->label('Bagian'),
                  Select::make ('id_sub_bagian')
                  ->relationship('subbagianjabatan', 'name')
                  ->label('Sub Bagian'),
                DatePicker::make('tgl_mulai_jabatan')
                ->label('Tanggal Mulai Jabatan')
                ->required(),
                TextInput::make('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawaijabatan.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make('jabatanpegawai.nama')
                ->label('Jabatan')
                ->sortable()
                ->searchable(),
                 TextColumn::make('bagianjabatane.name')
                 ->label('Bagian')
                 ->sortable()
                 ->searchable(),
                  TextColumn::make('subbagianjabatan.name')
                  ->label('Sub Bagian')
                  ->sortable()
                  ->searchable(),
                TextColumn::make('tgl_mulai_jabatan')
                ->label('Tanggal Mulai Jabatan')
                ->sortable(),
                TextColumn::make('keterangan')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListJabatanPegawais::route('/'),
            'create' => Pages\CreateJabatanPegawai::route('/create'),
            'edit' => Pages\EditJabatanPegawai::route('/{record}/edit'),
        ];
    }
}
