<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
  
    protected $fillable = ['kode_solusi', 'kode_gejala'];

    public function solusi()
    {
        return $this->belongsTo(Penyakit::class, 'kode_solusi', 'kode_solusi');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }
}
