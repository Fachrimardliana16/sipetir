<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{

    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_golongan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
        'name', 
        'keterangan'
    ];


    public function gajipokok(){
        return $this->hasMany(Gajipokok::class, 'id_golongan');
     }

     public function golonganpotongan(){
     return $this->hasMany(PotonganGolongan::class, 'id_golongan');
     }

     public function golongantunjangan(){
     return $this->hasMany(TunjanganGolongan::class, 'id_golongan');
     }

     public function golonganpegawai(){
     return $this->hasMany(GolonganPegawai::class, 'id_golongan');
     }

     

}
