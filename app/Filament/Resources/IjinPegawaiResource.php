<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IjinPegawaiResource\Pages;
use App\Filament\Resources\IjinPegawaiResource\RelationManagers;
use App\Models\IjinPegawai;
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

class IjinPegawaiResource extends Resource
{
    protected static ?string $model = IjinPegawai::class;

   protected static ?string $navigationIcon = 'heroicon-o-calendar';

   protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Section::make('Form Ijin/Cuti')
                 ->description('Form Pencatatan Ijin/Cuti Pegawai')
                 ->collapsible()
                 ->schema([
                    Select::make ('id_data_pegawai')
                    ->relationship('pegawaiijin', 'nama_pegawai')
                    ->preload()
                    ->label('Nama Pegawai')
                    ->searchable()
                    ->required(),
                    Select::make ('id_ijin')
                    ->relationship('ijinpegawai', 'name')
                    ->label('Ijin')
                    ->required(),
                    DatePicker::make ('tanggal_ijin')
                    ->required()
                 ]),
                 Section::make('Lampiran')
                 ->description('Lampiran Bukti Surat Sakit atau Surat Cuti')
                 ->collapsible()
                 ->schema([
                    FileUpload::make ('berkas')
                    ->label('Surat Sakit/Cuti')
                    ->disk('public')->directory('berkas_ijin'),
                    TextInput::make ('keterangan'),
                 ])->columns('1')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('pegawaiijin.nama_pegawai')
                 ->label('Nama Pegawai')
                 ->sortable()
                 ->searchable(),
                 TextColumn::make('ijinpegawai.name')
                 ->label('Ijin')
                 ->sortable()
                 ->searchable(),
                 TextColumn::make('tanggal_ijin')
                 ->sortable(),
                 TextColumn::make('berkas'),
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
            'index' => Pages\ListIjinPegawais::route('/'),
            'create' => Pages\CreateIjinPegawai::route('/create'),
            'edit' => Pages\EditIjinPegawai::route('/{record}/edit'),
        ];
    }
}
