<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;
    
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_perjanjian';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name',
    'keterangan'
    ];

    public function perjanjainpegawai(){
    return $this->hasMany(PerjanjianPegawai::class, 'id_perjanjian');
    }
}
