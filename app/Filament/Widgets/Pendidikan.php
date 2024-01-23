<?php

namespace App\Filament\Widgets;

use App\Models\PendidikanPegawai;
use Filament\Widgets\ChartWidget;

class Pendidikan extends ChartWidget
{

    protected static ?int $sort = 4;
    protected static ?string $description = ('Pendidikan Pegawai');
    protected static ?string $heading = 'Chart Pegawai Per-Pendidikan';

    protected function getData(): array
    {
        $data = PendidikanPegawai::all();

        $pendidikancounts = $data->groupBy('id_pendidikan')->map->count();

        return [
            'labels' => ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3', 'D4', 'D1'],
            'datasets' => [
                [
                'label' => 'Pendidikan Pegawai',
                'data' => $pendidikancounts->values()->toArray(),
                'backgroundColor' => '#36A2EB', // Warna untuk bagian bar chart
                ],
            ],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
