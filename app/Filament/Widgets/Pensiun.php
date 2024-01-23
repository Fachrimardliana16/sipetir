<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PegawaiResource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class Pensiun extends BaseWidget
{
     protected static ?int $sort = 5;

     protected static ?string $heading = ('Daftar Pensiun Pegawai Bulan Ini');
    public function table(Table $table): Table
    {

          $umurPensiun = 64;
          $tanggalBatasPensiun = Carbon::now()->subYears($umurPensiun);

        return $table
          ->query(
          PegawaiResource::getEloquentQuery()
          ->whereDate('tanggal_lahir', '<=', $tanggalBatasPensiun) )
            ->defaultPaginationPageOption(option:5)
            ->defaultSort('nama_pegawai')
            ->columns([
                  TextColumn::make('nip')
                  ->sortable()
                  ->searchable(),
                  TextColumn::make('nama_pegawai')
                  ->sortable()
                  ->searchable(),
                  TextColumn::make('tanggal_lahir')
                  ->date('d/m/Y')
                  ->sortable()
                  ->searchable(),
            ]);
    }
}
