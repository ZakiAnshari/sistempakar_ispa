<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $fillable = ['kode_gejala', 'nama_gejala', 'bobot_gejala'];

    // Define the relationship to Rule
  
}
