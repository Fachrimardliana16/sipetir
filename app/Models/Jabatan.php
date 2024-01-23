<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_jabatan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
        'nama', 
        'keterangan'
    ];

    public function jabatanpegawai(){
    return $this->hasMany(JabatanPegawai::class, 'id_jabatan');
    }
}
