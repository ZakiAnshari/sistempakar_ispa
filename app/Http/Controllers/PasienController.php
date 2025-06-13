<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
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
        return view('admin.pasien.index', compact('pasiens', 'roles', 'user', 'paginate'));
    }
    public function cetak()
    {
        $pasiens = Pasien::all(); // Ambil semua data pasien
        return view('admin.pasien.cetak', compact('pasiens')); // Kirim data ke view cetak
    }
    
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_pasien'    => 'required|string',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'alamat'         => 'required|string',
            'pekerjaan'      => 'required|string',
        ]);
    
        // Ambil hasil diagnosis dari input atau session
        $penyakitTerdeteksi = $request->input('penyakit_terdeteksi', 'Tidak terdeteksi'); // Default jika tidak ada penyakit
    
        // Simpan data ke database
        Pasien::create([
            'nama_pasien'    => $validated['nama_pasien'],
            'jenis_kelamin'  => $validated['jenis_kelamin'],
            'alamat'         => $validated['alamat'],
            'pekerjaan'      => $validated['pekerjaan'],
            'penyakit_terdeteksi' => $penyakitTerdeteksi, // Simpan hasil diagnosis
        ]);
    
        // Redirect atau beri respon sukses
        return redirect()->route('konsultasi-pertanyaan.index')->with('success', 'Pendaftaran dan hasil diagnosis berhasil disimpan!');
    }
    
    public function destroy($id)
    { 

        $pasiens = Pasien::where('id',$id)->first();
        $pasiens->delete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }
}
