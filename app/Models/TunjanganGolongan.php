<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganGolongan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_tunjangan_golongan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
        'id_tunjangan', 
        'id_golongan', 
        'jumlah', 
        'keterangan'
    ];

    public function golongantunjangan(){
    return $this->belongsTo(Golongan::class, 'id_golongan');
    }

    public function tunjangangolongan(){
    return $this->belongsTo(Tunjangan::class, 'id_tunjangan');
    }

}
