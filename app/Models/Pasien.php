<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin_pasien',
        'jenis_kelamin_ortu',
        'usia_pasien',
        'alamat_pasien',
        'tgl_pemeriksaan',
        'nama_ortu',
        'pekerjaan',
        'alamat_ortu',
        'no_nik',
        'no_hp',
        'penyakit_terdeteksi',
        'probabilitas',
        'definisi',
        'solusi',
    ];

    
}
