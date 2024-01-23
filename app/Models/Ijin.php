<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijin extends Model
{

    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_ijin';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name',
    'keterangan'
    ];

public function ijinpegawai(){
return $this->hasMany(IjinPegawai::class, 'id_ijin');
}
}
