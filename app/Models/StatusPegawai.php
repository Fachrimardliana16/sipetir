<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_status_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_status', 
    'tgl_mulai', 
    'no_sk', 
    'keterangan'
    ];

    public function pegawaistatus(){
    return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
    }

    public function statuspegawai(){
    return $this->belongsTo(Status::class, 'id_status');
    }
}
