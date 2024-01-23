<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendidikanPegawaiResource\Pages;
use App\Filament\Resources\PendidikanPegawaiResource\RelationManagers;
use App\Models\PendidikanPegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendidikanPegawaiResource extends Resource
{
    protected static ?string $model = PendidikanPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('Informasi Pendidikan')
                ->description('Form data informasi pendidikan')
                ->collapsible()
                ->schema([
                        Select::make ('id_data_pegawai')
                        ->relationship('pegawaipendidikan', 'nama_pegawai')
                        ->label('Nama Pegawai')
                        ->searchable()
                        ->preload()
                        ->required(),
                        Select::make ('id_pendidikan')
                        ->relationship('pendidikanpegawai', 'pendidikan')
                        ->label('Pendidikan')
                        ->required(),
                        TextInput::make('lokasi_pendidikan')
                        ->required(),
                        DatePicker::make('tgl_lulus')
                        ->label('Tanggal Selesai')
                        ->required(),
                ])->columns('2'),

                 Section::make('Dokumen Pendidikan')
                 ->description('Upload dokumen atau ijazah.')
                 ->collapsible()
                 ->schema([
                    FileUpload::make('keterangan')->disk('public')->directory('dokumen')
                    ->label('Ijazah atau Dokumen')
                    ->required()
                ])->columns('1')
             ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawaipendidikan.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make('pendidikanpegawai.pendidikan')
                ->label('Pendidikan')
                ->sortable()
                ->searchable(),
                TextColumn::make('lokasi_pendidikan')
                ->sortable()
                ->searchable(),
                TextColumn::make('tgl_lulus')
                ->label('Tanggal Selesai')
                ->sortable(),
                ImageColumn::make('keterangan')
                ->label('Dokumen')
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
            'index' => Pages\ListPendidikanPegawais::route('/'),
            'create' => Pages\CreatePendidikanPegawai::route('/create'),
            'edit' => Pages\EditPendidikanPegawai::route('/{record}/edit'),
        ];
    }
}
