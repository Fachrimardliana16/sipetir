<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\TableExtension;

class PerjanjianPegawai extends Model
{
     use HasFactory;

     // Tentukan nama tabel yang sesuai dengan struktur tabel di database
     protected $table = 'tbl_perjanjian_pegawai';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
    'id_data_pegawai', 
    'id_perjanjian', 
    'tanggal_perjanjian', 
    'no_surat', 
    'keterangan'
     ];

     public function pegawaiperjanjian(){
     return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
     }

     public function perjanjianpegawai(){
     return $this->belongsTo(Perjanjian::class, 'id_perjanjian');
     }
}
