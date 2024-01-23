<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipPegawaiResource\Pages;
use App\Filament\Resources\ArsipPegawaiResource\RelationManagers;
use App\Models\ArsipPegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\SelectAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArsipPegawaiResource extends Resource
{
    protected static ?string $model = ArsipPegawai::class;

     protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

     protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make ('Form Data Arsip')
                ->description('Input data asrip')
                ->schema([
                    Select::make ('id_data_pegawai')
                    ->relationship('pegawaiarsip', 'nama_pegawai')
                    ->label('Nama Pegawai')
                    ->searchable()
                    ->preload()
                    ->required(),
                    Select::make ('id_tipe_arsip')
                    ->relationship('arsippegawai', 'name')
                    ->label('Tipe Arsip')
                    ->searchable()
                    ->preload()
                    ->required()
                ])->columns('2'),
                Section::make ('Berkas Arsip')
                ->description('Upload Berkas Arsip')
                ->schema([
                    TextInput::make('nama_dokumen')
                    ->label('Nama Dokumen')
                    ->required(),
                    FileUpload::make ('dokumen')
                    ->disk('public')->directory('arsip')
                    ->required(),
                    DatePicker::make('tgl_arsip')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('pegawaiarsip.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('arsippegawai.name')
                ->label('Tipe Arsip')
                ->sortable()
                ->searchable(),
                TextColumn::make ('nama_dokumen')
                ->sortable()
                ->searchable(),
                TextColumn::make ('dokumen'),
                TextColumn::make ('tgl_arsip')
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
            'index' => Pages\ListArsipPegawais::route('/'),
            'create' => Pages\CreateArsipPegawai::route('/create'),
            'edit' => Pages\EditArsipPegawai::route('/{record}/edit'),
        ];
    }
}
