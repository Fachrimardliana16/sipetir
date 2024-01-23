<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPegawai extends Model
{

    use HasFactory;
    protected $table = 'tbl_jabatan_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_jabatan', 
    'tgl_mulai_jabatan', 
    'keterangan'
    ];

    public function pegawaijabatan(){
    return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
    }

    public function jabatanpegawai(){
    return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function bagianjabatan(){
    return $this->belongsTo(bagian::class, 'id_bagian');
    }

    public function subbagianjabatan(){
    return $this->belongsTo(subbagian::class, 'id_sub_bagian');
    }
}
