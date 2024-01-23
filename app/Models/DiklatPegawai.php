<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiklatPegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_diklat';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'name', 
    'tgl_diklat', 
    'lokasi', 
    'penyelenggara', 
    'keterangan', 
    ];

     public function pegawaidiklat(){
     return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
     }
}
