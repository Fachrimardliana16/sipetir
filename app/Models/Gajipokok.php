<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gajipokok extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_gaji_pokok';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_golongan', 
    'name', 
    'keterangan'
    ];

    public function golongan(){
        return $this->belongsTo(Golongan::class, 'id_golongan');
    }

    public function gajipokokpegawai(){
    return $this->hasMany(GajipokokPegawai::class, 'id_gaji_pokok');
    }

    public function gajipokokpegawaiall(){
    return $this->belongsTo(GajipokokPegawai::class, 'id_gaji_pokok');
    }
}
