<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeArsip extends Model
{
    use HasFactory;

    protected $table = 'tbl_tipe_arsip';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name', 
    'keterangan',
    'created_at', 
    'updated_at'
    ];

    public function arsippegawai(){
    return $this->hasMany(ArsipPegawai::class, 'id_tipe_arsip');
    }
}
