<?php

namespace App\Filament\Widgets;

use App\Models\Bagian;
use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\PerjanjianPegawai;
use App\Models\StatusPegawai;
use App\Models\Subbagian;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
              Stat::make('Pegawai Tetap', StatusPegawai::query()
              ->where('id_status', 1)
              ->count())
              ->description('Jumlah Pegawai Tetap')
              ->color('success'),
              Stat::make('Calon Pegawai', StatusPegawai::query()
              ->where('id_status', 2)
              ->count())
              ->description('Jumlah Calon Pegawai')
              ->color('success'),
              Stat::make('Kontrak', StatusPegawai::query()
              ->where('id_status', 3)
              ->count())
              ->description('Jumlah Kontrak')
              ->color('success'),
              Stat::make('THL', StatusPegawai::query()
              ->where('id_status', 4)
              ->count())
              ->description('Jumlah Tenaga Harian Lepas')
              ->color('success'),
        ];
    }
}
