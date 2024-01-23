<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PegawaiResource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class Ulangtahun extends BaseWidget
{
    protected static ?int $sort = 5;

    protected static ?string $heading = ('Daftar Ulang Tahun Pegawai Bulan Ini');
    public function table(Table $table): Table
    {
        return $table
             ->query(
             PegawaiResource::getEloquentQuery()
             ->whereMonth('tanggal_lahir', now()->month)
             ->orderBy('tanggal_lahir', 'asc')) 
             ->defaultPaginationPageOption(option: 5)
             ->defaultSort('nama_pegawai')
             ->columns([
             TextColumn::make('nama_pegawai')
             ->sortable()
             ->searchable(),
             TextColumn::make('tanggal_lahir')
             ->date('d/m/Y')
             ->sortable()
             ->searchable(),
              TextColumn::make('Umur')
              ->sortable()
              ->searchable(),
             ]);
    }
}
