<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use App\Models\PerjanjianPegawai;
use Filament\Widgets\ChartWidget;

class Gender extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '100%';
    protected static ?string $heading = 'Grafik Jenis Kelamin';

     protected function getData(): array
     {
     // Ambil data dari database
     $data = Pegawai::all();

    $countPerjanjaian = $data->groupBy('jenis_kelamin')->map->count();

     // Kembalikan data yang sudah diproses
     return [
        'labels' => ['Laki-laki', 'Perempuan'],
        'datasets' => [
            [
            'label' => 'Jenis Keamin',
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
