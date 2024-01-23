<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbagian extends Model
{
    use HasFactory;
    
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_sub_bagian';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name', 
    'id_bagian', 
    'keterangan'
];

 public function bagian(){
 return $this->belongsTo(Bagian::class, 'id_bagian');
 }

  public function subbagianjabatan(){
  return $this->hasMany(JabatanPegawai::class, 'id_sub_bagian');
  }
    
    
}
