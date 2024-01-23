<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganPegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_golongan_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_golongan', 
    'keterangan', 
    'updated_at', 
    'created_at'
    ];

    public function pegawaigolongan(){
    return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
    }

    public function golonganpegawai(){
    return $this->belongsTo(Golongan::class, 'id_golongan');
    }

    public function golongangaji(){
    return $this->hasMany(GajipokokPegawai::class, 'id_golongan_pegawai');
    }

    
}
