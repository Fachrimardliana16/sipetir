<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanPegawai extends Model
{
   use HasFactory;
   
     protected $table = 'tbl_pendidikan_pegawai';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
        'id_data_pegawai', 
        'id_pendidikan', 
        'lokasi_pendidikan', 
        'tgl_lulus', 
        'keterangan', 
        'updated_at', 
        'created_at'
     ];

     public function pegawaipendidikan(){
        return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
     }

     public function pendidikanpegawai(){
        return $this->belongsTo(pendidikan::class, 'id_pendidikan');
     }
}
