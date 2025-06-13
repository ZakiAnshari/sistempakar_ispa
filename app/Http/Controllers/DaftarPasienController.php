<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gejala;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPasienController extends Controller
{
    // Menampilkan form daftar pasien
    public function index()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $pasiens = Pasien::all();
        $gejalas = Gejala::all();
        return view('learn.daftar-pasien', compact('gejalas', 'pasiens','user')); // Arahkan ke view dengan struktur direktori yang benar
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_pasien'          => 'required|string',
            'jenis_kelamin_pasien' => 'required|in:Laki-laki,Perempuan', // Perbaikan nama field
            'alamat_pasien'        => 'required|string',                 // Perbaikan nama field
            'pekerjaan'            => 'required|string',
            'no_nik'               => 'required|string|size:16', // Validasi untuk NIK
            'no_hp'                => 'required|string|max:15',  // Validasi untuk No HP
        ]);

        // Ambil hasil diagnosis dari input atau session
        // Biasanya hasil ini datang dari inferensi, seperti di kode diagnose()
        $penyakitTerdeteksi = $request->input('penyakit_terdeteksi', 'Tidak terdeteksi');
        $probabilitas       = $request->input('probabilitas', 0);            // Ambil hasil probabilitas
        $definisi           = $request->input('definisi', 'Tidak Tersedia'); // Definisi dari penyakit
        $solusi             = $request->input('solusi', 'Tidak Tersedia');   // Solusi yang diberikan

        // Simpan data ke database
        Pasien::create([
            'nama_pasien'          => $validated['nama_pasien'],
            'jenis_kelamin_pasien' => $validated['jenis_kelamin_pasien'], // Menambahkan jenis kelamin pasien
            'alamat_pasien'        => $validated['alamat_pasien'],        // Menambahkan alamat pasien
            'pekerjaan'            => $validated['pekerjaan'],
            'no_nik'               => $validated['no_nik'], // NIK pasien
            'no_hp'                => $validated['no_hp'],  // No HP pasien
            'penyakit_terdeteksi'  => $penyakitTerdeteksi,  // Penyakit yang terdeteksi
            'probabilitas'         => $probabilitas,        // Probabilitas hasil diagnosis
            'definisi'             => $definisi,            // Definisi penyakit
            'solusi'               => $solusi,              // Solusi atau rekomendasi
        ]);

        // Redirect atau beri respon sukses
        return redirect()->route('konsultasi-pertanyaan.index')->with('success', 'Data berhasil disimpan!');
    }

    public function logout(Request $request)
    {
        // Logout pengguna
        Auth::logout();

        // Invalidate sesi
        $request->session()->invalidate();

        // Regenerate token sesi
        $request->session()->regenerateToken();

        // Redirect ke halaman utama atau login
        return redirect('/login')->with('success', 'Logout berhasil.');
    }

}
