<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_potongan';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'name',
    'keterangan'];

    public function potongangolongan(){
    return $this->hasMany(Potongan::class, 'id_potongan');
    }
}
