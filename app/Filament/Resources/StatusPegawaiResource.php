<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusPegawaiResource\Pages;
use App\Filament\Resources\StatusPegawaiResource\RelationManagers;
use App\Models\StatusPegawai;
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

class StatusPegawaiResource extends Resource
{
    protected static ?string $model = StatusPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = "Data Pegawai";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make ('id_data_pegawai')
                ->relationship('pegawaistatus', 'nama_pegawai')
                ->searchable()
                ->preload()
                ->label('Pegawai')
                ->required(),
                Select::make ('id_status')
                ->relationship('statuspegawai', 'name')
                ->label('Status')
                ->required(),
                DatePicker::make('tgl_mulai'),
                TextInput::make('no_sk')
                ->numeric()
                ->required(),
                TextInput::make('keterangan')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make ('pegawaistatus.nama_pegawai')
                ->label('Nama Pegawai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('statuspegawai.name')
                ->label('Status')
                ->sortable()
                ->searchable(),
                TextColumn::make ('tgl_mulai')
                ->label('Tanggal Mulai')
                ->sortable()
                ->searchable(),
                TextColumn::make ('no_sk')
                ->label('Nomo SK')
                ->sortable()
                ->searchable(),
                TextColumn::make ('keterangan')
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
            'index' => Pages\ListStatusPegawais::route('/'),
            'create' => Pages\CreateStatusPegawai::route('/create'),
            'edit' => Pages\EditStatusPegawai::route('/{record}/edit'),
        ];
    }
}
