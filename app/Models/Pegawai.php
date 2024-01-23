<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang sesuai dengan struktur tabel di database
    protected $table = 'tbl_data_pegawai';

    // Tentukan kolom-kolom yang dapat diisi (fillable) oleh model
    protected $fillable = [
    'nip', 'nama_pegawai', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'usia', 'alamat',
    'gol_darah', 'status_nikah', 
    
    'no_tlp', 'no_ktp', 'no_kk', 'no_npwp', 'no_rekening', 'no_bpjs_tk', 'no_bpjs_kes',
    
    'status_pegawai', 'tanggal_pengangkatan_cpns', 'id_golongan', 
    
    'id_jabatan', 'id_status_jabatan', 'nomor_sk_jabatan',
    'tanggal_sk_jabatan', 'tanggal_mulai_jabatan', 'tanggal_selesai_jabatan', 
    
    'id_unit_kerja', 'id_satuan_kerja', 'lokasi_kerja', 'tanggal_masuk', 'status_pegawai_pangkat', 'nomor_sk_pangkat', 'tanggal_sk_pangkat',
    'tanggal_mulai_pangkat', 'tanggal_selesai_pangkat', 'id_eselon', 'tmt_eselon', 'rek_dplk_pribadi',
    'rek_dplk_bersama', 'username', 'email', 'password', 'foto'
    ];

    public function pegawaiperjanjian(){
    return $this->hasMany(PerjanjianPegawai::class, 'id_data_pegawai');
    }

    public function pegawaistatus(){
    return $this->hasMany(StatusPegawai::class, 'id_data_pegawai');
    }

    public function pegawaibagian(){
    return $this->hasMany(Bagianpegawai::class, 'id_data_pegawai');
    }

    public function pegawaijabatan(){
    return $this->hasMany(JabatanPegawai::class, 'id_data_pegawai');
    }

     public function pegawaigapok(){
     return $this->hasMany(GajipokokPegawai::class, 'id_data_pegawai');
     }

      public function pegawaiijin(){
      return $this->hasMany(IjinPegawai::class, 'id_data_pegawai');
      }

     public function pegawaipendidikan(){
         return $this->hasMany(PendidikanPegawai::class, 'id_data_pegawai');
     }

     public function pegawaigolongan(){
     return $this->hasMany(GolonganPegawai::class, 'id_data_pegawai');
     }

     public function pegawaiarsip(){
     return $this->hasMany(ArsipPegawai::class, 'id_data_pegawai');
     }

     public function pegawaidiklat(){
     return $this->hasMany(DiklatPegawai::class, 'id_data_pegawai');
     }

     public function pegawaikeluarga(){
     return $this->hasMany(KeluargaPegawai::class, 'id_data_pegawai');
     }

    

}
