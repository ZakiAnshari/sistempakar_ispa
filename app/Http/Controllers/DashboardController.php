<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $gejalaCount = Gejala::count();
    $pasienCount = Pasien::count();
    $penyakitCount = Penyakit::count();
    $userCount = User::count();

    $user = Auth::user(); // Mendapatkan pengguna yang sedang login
    $roles = $user->role; // Mengambil role pengguna
    $gejalas = Gejala::all();
    
    return view('admin.dashboard.index', [
        'gejala_count' => $gejalaCount,
        'pasien_count' => $pasienCount,
        'penyakit_count' => $penyakitCount,
        'user_count' => $userCount,
        'user' => $user,
        'roles' => $roles,
        'gejalas' => $gejalas
    ]);
}
}
