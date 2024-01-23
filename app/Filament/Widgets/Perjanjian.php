<?php

namespace App\Filament\Widgets;

use App\Models\PerjanjianPegawai;
use Filament\Widgets\ChartWidget;

class Perjanjian extends ChartWidget
{
    protected static ?int $sort = 3;

    protected static ?string $maxHeight = '100%';

    protected static ?string $heading = 'Grafik Perjanjian Pegawai';

     protected function getData(): array
     {
     // Ambil data dari database
     $data = PerjanjianPegawai::all();

    $countPerjanjaian = $data->groupBy('id_perjanjian')->map->count();

     // Kembalikan data yang sudah diproses
     return [
        'labels' => ['PKWTT', 'PKWT'],
        'datasets' => [
            [
            'label' => 'Jumlah Perjanjian',
            'data' => $countPerjanjaian->values()->toArray(),
            'backgroundColor' => ['#FF6384', '#36A2EB'], // Warna untuk setiap bagian
            ],
        ],
        ];
     }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
