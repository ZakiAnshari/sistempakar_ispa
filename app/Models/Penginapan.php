<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penginapan',
        'deskripsi',
        'tentang_penginapan',
        'lokasi',
        'harga_per_malam',
        'image1',
        'image2',
        'image3',
        'image4',
    ];
}
