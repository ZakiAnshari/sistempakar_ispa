<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'jenis_kelamin', 'alamat', 'pekerjaan', 'tanggal_diagnosa', 'penyakit'
    ];
}
