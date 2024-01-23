<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajipokokPegawai extends Model
{

    use HasFactory;
    
    protected $table = 'tbl_gaji_pokok_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_data_pegawai', 
    'id_gaji_pokok',
    'id_golongan_pegawai',
    'tgl_ubah', 
    'keterangan', 
];

public function pegawaigapok(){
    return $this->belongsTo(Pegawai::class, 'id_data_pegawai');
}

public function gajipokokpegawaiall(){
    return $this->belongsTo(Gajipokok::class, 'id_gaji_pokok');
}

public function gajipokokpegawai(){
return $this->hasMany(GajiPokokPegawai::class, 'id_gaji_pokok_pegawai');
}


}
