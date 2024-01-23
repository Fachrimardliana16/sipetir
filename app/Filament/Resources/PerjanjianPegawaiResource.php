<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerjanjianPegawaiResource\Pages;
use App\Filament\Resources\PerjanjianPegawaiResource\RelationManagers;
use App\Models\PerjanjianPegawai;
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


class PerjanjianPegawaiResource extends Resource
{
    protected static ?string $model = PerjanjianPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_data_pegawai')
                ->relationship('pegawaiperjanjian', 'nama_pegawai')
                ->label('Pegawai')
                ->searchable()
                ->preload()
                ->required(),
                Select::make ('id_perjanjian')
                ->relationship('perjanjianpegawai', 'name')
                ->label('Perjanjian Kontrak')
                ->required(),
                DatePicker::make('tanggal_perjanjian')->required(),
                TextInput::make('no_surat')
                ->label('Nomor SK')
                ->numeric()
                ->required(),
                TextInput::make('keterangan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawaiperjanjian.nama_pegawai')
                ->label('Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make('perjanjianpegawai.name')
                ->label('Perjanjian')
                ->sortable()
                ->searchable(),
                TextColumn::make('tanggal_perjanjian')
                ->sortable()
                ->label('Tanggal Perjanjian'),
                TextColumn::make('no_surat')
                ->label('Nomor SK'),
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
            'index' => Pages\ListPerjanjianPegawais::route('/'),
            'create' => Pages\CreatePerjanjianPegawai::route('/create'),
            'edit' => Pages\EditPerjanjianPegawai::route('/{record}/edit'),
        ];
    }
}
