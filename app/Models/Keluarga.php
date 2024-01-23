<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'tbl_keluarga';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
        'name',
        'keterangan'
    ];

    public function keluargapegawai(){
    return $this->hasMany(KeluargaPegawai::class, 'id_keluarga');
    }


}
