<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_tunjangan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name',
    'keterangan'
    ];

    public function golongantunjangan(){
    return $this->hasMany(TunjanganGolongan::class, 'id_tunjangan');
    }
}
