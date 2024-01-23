<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianPegawai extends Model
{ 

    use HasFactory;
    protected $table = 'tbl_bagian_pegawai';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
    'id_data_pegawai', 
    'id_bagian', 
    'tgl_masuk_bagian', 
    'keterangan'
     ];

     public function pegawaibagian(){
     return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
     }

     public function bagianpegawai(){
     return $this->belongsTo(Bagian::class, 'id_bagian');
     }
}
