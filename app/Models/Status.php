<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     use HasFactory;

     // Tentukan nama tabel yang sesuai dengan struktur tabel di database
     protected $table = 'tbl_status';

     // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
     protected $fillable = [
     'name',
     'keterangan'
     ];

     public function statuspegawai(){
     return $this->hasMany(StatusPegawai::class, 'id_status');
     }
}
