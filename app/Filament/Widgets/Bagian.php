<?php

namespace App\Filament\Widgets;

use App\Models\BagianPegawai;
use Filament\Widgets\ChartWidget;

class Bagian extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Chart Pegawai Per-Bagian';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = BagianPegawai::all();

        // Proses data
        $bagianCounts = $data->groupBy('id_bagian')->map->count();

        // Labels untuk chart
        $labels = ['Teknik', 'Umum', 'Keuangan', 'Hubungan Langganan', 'Satuan Pengawas Internal', 'Cabang Kota Bangga', 'Cabang Goentoer Djarjono', 'Cabang Usman Janatin', 'Cabang Jendral Soedirman', 'Cabang Ardi Lawet', 'Unit IKK Kemangkon', 'Unit IKK Bukateja', 'Unit IKK Rembang', 'AMDK'];

        // Kembalikan data yang sudah diproses
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Pegawai',
                    'data' => $bagianCounts->values()->toArray(),
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
