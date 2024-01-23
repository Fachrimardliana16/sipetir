<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_pendidikan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
        'pendidikan', 
        'keterangan'
    ];

    public function pendidikanpegawai(){
         return $this->hasMany(PendidikanPegawai::class, 'id_pendidikan');
    }
}
