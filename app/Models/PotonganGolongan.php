<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganGolongan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_potongan_golongan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'id_potongan', 
    'id_golongan', 
    'jumlah', 
    'keterangan'
    ];

    public function golonganpotongan(){
    return $this->belongsTo(Golongan::class, 'id_golongan');
    }

    public function potongangolongan(){
    return $this->belongsTo(Potongan::class, 'id_potongan');
    }


}
