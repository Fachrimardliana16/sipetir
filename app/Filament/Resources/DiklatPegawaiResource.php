<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiklatPegawaiResource\Pages;
use App\Filament\Resources\DiklatPegawaiResource\RelationManagers;
use App\Models\DiklatPegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiklatPegawaiResource extends Resource
{
    protected static ?string $model = DiklatPegawai::class;

        protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

        protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Section::make ('Berkas Diklat')
                 ->description('Upload Berkas Diklat')
                 ->schema([
                    Select::make ('id_data_pegawai')
                    ->relationship('pegawaidiklat','nama_pegawai')
                    ->label('Nama Pegawai')
                    ->searchable()
                    ->preload()
                    ->required(),
                    TextInput::make ('name')
                    ->label('Nama Diklat')
                    ->required(),
                    DatePicker::make('tgl_diklat')
                    ->required(),
                    TextInput::make('lokasi')
                    ->label('Lokasi Diklat')
                    ->required(),
                    TextInput::make('penyelenggaran')
                    ->required(),
                 ])->columns('2'),
                    
                Section::make ('Berkas Diklat')
                ->description('Upload Berkas Diklat')
                ->schema([
                    FileUpload::make ('keterangan')
                    ->label('Berkas Diklat')
                    ->disk('public')->directory('diklat')
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('pegawaidiklat.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('name')
                ->label('Nama Diklat')
                ->sortable()
                ->searchable(),
                TextColumn::make ('tgl_diklat')
                ->label('Tanggal Diklat')
                ->sortable()
                ->searchable(),
                TextColumn::make ('lokasi'),
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
            'index' => Pages\ListDiklatPegawais::route('/'),
            'create' => Pages\CreateDiklatPegawai::route('/create'),
            'edit' => Pages\EditDiklatPegawai::route('/{record}/edit'),
        ];
    }
}
