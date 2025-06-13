<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;

class laporanController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();
        // Mengambil role pengguna
        $roles = $user->role;
        // Mengambil jumlah item per halaman dari parameter request atau default ke 10
        $paginate = $request->input('itemsPerPage', 10);
        // Mengambil data dari tabel Surfinglokasi dengan paginasi
        $pasiens = Pasien::paginate($paginate);
    
        // Mengirim data ke view menggunakan compact untuk lebih rapi
        return view('admin.diagnosa.index', compact('pasiens', 'roles', 'user', 'paginate'));
    }
    public function cetak()
    {
        $pasiens = Pasien::all(); // Ambil semua data pasien
        return view('admin.diagnosa.cetak', compact('pasiens')); // Kirim data ke view cetak
    }
}
