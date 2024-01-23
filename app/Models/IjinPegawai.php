<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IjinPegawai extends Model
{

    use HasFactory;
    
    protected $table = 'tbl_ijinpegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_ijin', 
    'tanggal_ijin', 
    'berkas', 
    'keterangan'
    ];

    public function pegawaiijin(){
    return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
    }

    public function ijinpegawai(){
    return $this->belongsTo(Ijin::class, 'id_ijin');
    }
}
