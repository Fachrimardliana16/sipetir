<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GajipokokPegawaiResource\Pages;
use App\Filament\Resources\GajipokokPegawaiResource\RelationManagers;
use App\Models\GajipokokPegawai;
use App\Models\GolonganPegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GajipokokPegawaiResource extends Resource
{
    protected static ?string $model = GajipokokPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                 Select::make ('id_data_pegawai')
                 ->relationship('pegawaigapok', 'nama_pegawai')
                 ->label('Nama Pegawai')
                 ->searchable()
                 ->preload()
                 ->required(),
                  Select::make ('id_gaji_pokok')
                  ->relationship('gajipokokpegawaiall', 'name')
                  ->label('Gaji Pokok')
                  ->searchable()
                  ->preload()
                  ->required(),
                 DatePicker::make ('tgl_ubah')
                  ->label('Tanggal Ubah')
                 ->required(),
                 TextInput::make ('keterangan')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawaigapok.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                 TextColumn::make('gajipokokpegawaiall.name')
                 ->label('Gaji Pokok')
                 ->money('IDR')
                 ->sortable()
                 ->searchable(),
                 TextColumn::make('tgl_ubah')
                 ->label('Tanggal Ubah'),
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
            'index' => Pages\ListGajipokokPegawais::route('/'),
            'create' => Pages\CreateGajipokokPegawai::route('/create'),
            'edit' => Pages\EditGajipokokPegawai::route('/{record}/edit'),
        ];
    }
}
