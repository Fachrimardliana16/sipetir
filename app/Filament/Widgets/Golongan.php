<?php

namespace App\Filament\Widgets;

use App\Models\GolonganPegawai;
use Filament\Widgets\ChartWidget;

class Golongan extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Chart Pegawai Per-Golongan';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = GolonganPegawai::all();

        // Proses data
        $golonganCounts = $data->groupBy('id_golongan')->map->count();

        // Kembalikan data yang sudah diproses
        return [
            'labels' => ['A1', 'A2', 'A3', 'A4', 'B1', 'B2', 'B3', 'B4', 'C1', 'C2', 'C3', 'C4', 'D1', 'D2', 'D3', 'D4',
            'Kontrak', 'THL', 'Honor Tetap'],
            'datasets' => [
                [
                    'label' => 'Golongan Pegawai',
                    'data' => $golonganCounts->values()->toArray(),
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
