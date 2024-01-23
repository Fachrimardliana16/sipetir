<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
   use HasFactory;
     // Tentukan nama tabel yang sesuai dengan struktur tabel di database
     protected $table = 'tbl_bagian';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
        'name', 
        'keterangan',

     ];

     public function subbagians(){
     return $this->hasMany(Subbagian::class, 'id_bagian');
     }
     public function bagianpegawai(){
     return $this->hasMany(bagianpegawai::class, 'id_bagian');
     }

     public function bagianjabatan(){
     return $this->hasMany(JabatanPegawai::class, 'id_bagian');
     }
    
}
