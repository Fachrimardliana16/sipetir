<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaPegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_keluarga_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_keluarga', 
    'nama', 
    'tempat_lahir', 
    'tgl_lahir', 
    'jenis_kelamin', 
    'nik', 
    'keterangan'
    ];

    public function pegawaikeluarga(){
     return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
    }

    public function keluargapegawai(){
    return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }
}
