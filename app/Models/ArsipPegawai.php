<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipPegawai extends Model
{
    use HasFactory;

     protected $table = 'tbl_arsip_pegawai';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
        'id_data_pegawai', 
        'id_tipe_arsip', 
        'nama_dokumen', 
        'dokumen', 
        'tgl_arsip', 
        'updated_at', 
        'created_at'
     ];

      public function pegawaiarsip(){
        return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
      }

      public function arsippegawai(){
        return $this->belongsTo(TipeArsip::class, 'id_tipe_arsip');
      }
}
