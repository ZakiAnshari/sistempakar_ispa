<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        $gejalas = Gejala::all();
        return view('learn.pertanyaan', compact('gejalas','pasiens')); // Arahkan ke view dengan struktur direktori yang benar
    }
}
