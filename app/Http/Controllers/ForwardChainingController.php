<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class ForwardChainingController extends Controller
{
    public function form()
    {
         // Ambil semua gejala
            $pasiens = Pasien::all();
            $gejalas = Gejala::all();
            return view('Front_end.konsultasi-pertanyaan', compact('gejalas','pasiens'));
    }

    public function diagnose(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin_pasien' => 'required|string|in:Laki-laki,Perempuan', // Validasi jenis kelamin pasien
            'jenis_kelamin_ortu' => 'required|string|in:Laki-laki,Perempuan', // Validasi jenis kelamin orang tua
            'usia_pasien' => 'required|integer|min:0|max:120', // Usia pasien antara 0 dan 120 tahun
            'alamat_pasien' => 'required|string|max:255',
            'tgl_pemeriksaan' => 'required|date', // Validasi sebagai tanggal yang benar
            'nama_ortu' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat_ortu' => 'required|string|max:255',
            'no_nik' => 'required|string|size:16', // Validasi NIK harus 16 karakter
            'no_hp' => 'required|string|max:15', // Validasi nomor HP maksimal 15 karakter
            'penyakit_terdeteksi' => 'nullable|string|max:255', // Nullable jika tidak ada penyakit
            'probabilitas' => 'nullable|numeric|min:0|max:100', // Probabilitas dalam rentang 0-100
            'definisi' => 'nullable|string', // Bisa kosong, validasi sebagai string
            'solusi' => 'nullable|string', // Bisa kosong, validasi sebagai string
        ]);
        
    
        // Ambil semua gejala dan aturan
        $gejalas = Gejala::all();
        $rules = Rule::with(['gejala', 'solusi'])->get();
    
        // Menyimpan gejala yang dipilih oleh pengguna
        $selectedGejalas = [];
        foreach ($gejalas as $index => $gejala) {
            $questionKey = 'question' . ($index + 1);
            if ($request->has($questionKey) && $request->$questionKey == 1) {
                $selectedGejalas[] = $gejala; // Tambahkan gejala yang dipilih
            }
        }
    
        // Ambil nama-nama gejala yang dipilih untuk ditampilkan di view
        $selectedGejalasNames = $selectedGejalas;
    
        // Hitung total skor berdasarkan bobot gejala yang dipilih
        $totalSkor = array_sum(array_map(function ($gejala) {
            return $gejala->bobot_gejala; // Ambil bobot dari gejala
        }, $selectedGejalas));
    
        // Proses inferensi untuk menentukan penyakit menggunakan Forward Chaining
        $diagnosis = [];
        foreach ($rules as $rule) {
            if (in_array($rule->gejala->kode_gejala, array_column($selectedGejalas, 'kode_gejala'))) {
                // Jika gejala ada di aturan, tambahkan bobot gejala ke skor penyakit
                $diagnosis[$rule->kode_solusi] = isset($diagnosis[$rule->kode_solusi])
                    ? $diagnosis[$rule->kode_solusi] + $rule->gejala->bobot_gejala
                    : $rule->gejala->bobot_gejala;
            }
        }
    
        // Hitung probabilitas diagnosis berdasarkan skor total
        $result = [];
        foreach ($diagnosis as $kodeSolusi => $skor) {
            $penyakit = Penyakit::where('kode_solusi', $kodeSolusi)->first();
            
            // Ambil seluruh gejala yang berkaitan dengan penyakit ini
            $rulesPenyakit = $rules->where('kode_solusi', $kodeSolusi);
            
            // Hitung total gejala dengan mempertimbangkan bobot gejala
            $totalBobotGejala = 0;
            $totalSkorGejala = 0;

            foreach ($rulesPenyakit as $rule) {
                // Ambil bobot gejala dari data rules atau database
                $bobotGejala = $rule->bobot ?? 1;  // Jika bobot tidak ada, anggap 1
                $totalBobotGejala += $bobotGejala;
                $totalSkorGejala += ($skor * $bobotGejala); // Skor dikalikan bobot gejala
            }

            // Hitung probabilitas menggunakan total bobot dan skor
            if ($totalBobotGejala > 0) {
                $probabilitas = ($totalSkorGejala / ($totalBobotGejala * 3)) * 100;  // Asumsikan bobot maksimum 3 per gejala
            } else {
                $probabilitas = 0; // Jika total bobot gejala 0, probabilitas 0
            }

            // Tambahkan hasil ke array hasil
            $result[] = [
                'penyakit' => $penyakit->penyakit ?? 'Tidak Diketahui',
                // Tambahkan kondisi untuk menentukan ISPA RINGAN, SEDANG, dan BERAT
                'definisi' => (in_array(trim($penyakit->penyakit), [
                                    'Demam',
                                    'Mata Merah , Sakit Tenggorokan , Hidung Tersumbat',
                                    'Batuk , Pilek , Suara serak',
                                    'Pilek , Suara serak , Hidung tersumbat',
                                    'Batuk , Suara serak , Hidung tersumbat',
                                    'Pilek , Mata Merah , Hidung tersumbat',
                                    'Demam , Pilek , Hidung tersumbat',
                                    'Demam , Batuk , Mata Merah',
                                    'Demam , Batuk , Muntah',
                                    'Batuk , Sakit tenggorokan , Hidung tersumbat'
                                ])) ? 'ISPA RINGAN' :
                                ((in_array(trim($penyakit->penyakit), [
                                    'Demam , Batuk , Suara Bengek',
                                    'Sesak Nafas , Muntah , Suara Bengek',
                                    'Demam , Batuk , Suara Serak',
                                    'Batuk , Sesak Nafas , Suara Serak',
                                    'Demam , Sakit Tenggorokan , Suara Serak',
                                    'Demam , Sakit Tenggorokan , Muntah',
                                    'Batuk , Suara Serak , Hidung tersumbat',
                                    'Sesak Nafas , Muntah , Suara Bengek'
                                ])) ? 'ISPA SEDANG' :
                                ((in_array(trim($penyakit->penyakit), [
                                    'Demam , Batuk , Suara Serak',
                                    'Demam , Sesak Nafas , Muntah',
                                    'Demam , Mata Merah , Suara Serak , Muntah',
                                    'Demam , Sesak Nafas , Muntah , Suara Bengek , Hidung Tersumbat',
                                    'Batuk , Sesak Nafas , Suara Bengek',
                                    'Demam , Sesak Nafas , Suara Bengek',
                                    'Suara Serak , Muntah , Suara Bengek'
                                ])) ? 'ISPA BERAT' : 'Tidak Tersedia')),
                'solusi' => $penyakit->solusi ?? 'Tidak Tersedia',
                'probabilitas' => round($probabilitas, 2),  // Pembulatan 2 angka desimal
            ];
            
            
            
            
        }

    
        // Ambil hasil diagnosis terbaik (probabilitas tertinggi)
        $topResult = collect($result)->sortByDesc('probabilitas')->first();
    
        // Simpan hasil diagnosis ke database
        Pasien::create([
            'nama_pasien' => $request->input('nama_pasien'),
            'jenis_kelamin_pasien' => $request->input('jenis_kelamin_pasien'),  // Menambahkan jenis kelamin pasien
            'jenis_kelamin_ortu' => $request->input('jenis_kelamin_ortu'),  // Menambahkan jenis kelamin orang tua
            'usia_pasien' => $request->input('usia_pasien'),
            'alamat_pasien' => $request->input('alamat_pasien'),
            'tgl_pemeriksaan' => $request->input('tgl_pemeriksaan'),
            'nama_ortu' => $request->input('nama_ortu'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat_ortu' => $request->input('alamat_ortu'),
            'no_nik' => $request->input('no_nik'),
            'no_hp' => $request->input('no_hp'),
            'penyakit_terdeteksi' => $topResult['penyakit'] ?? null,
            'probabilitas' => $topResult['probabilitas'] ?? 0,
            'definisi' => $topResult['definisi'] ?? null,
            'solusi' => $topResult['solusi'] ?? null,
        ]);
        
        
    
        // Tambahkan data pasien untuk ditampilkan di view
        $pasiens = [
            'nama_pasien' => $request->input('nama_pasien'),
            'jenis_kelamin_pasien' => $request->input('jenis_kelamin_pasien'),
            'jenis_kelamin_ortu' => $request->input('jenis_kelamin_ortu'),
            'usia_pasien' => $request->input('usia_pasien'),
            'alamat_pasien' => $request->input('alamat_pasien'),
            'tgl_pemeriksaan' => $request->input('tgl_pemeriksaan'),
            'nama_ortu' => $request->input('nama_ortu'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat_ortu' => $request->input('alamat_ortu'),
            'no_nik' => $request->input('no_nik'),
            'no_hp' => $request->input('no_hp'),
            'penyakit_terdeteksi' => $request->input('penyakit_terdeteksi'),
            'probabilitas' => $request->input('probabilitas'),
            'definisi' => $request->input('definisi'),
            'solusi' => $request->input('solusi'),
        ];
          // Hitung probabilitas untuk semua penyakit
         $allPenyakit = Penyakit::all(); // Ambil semua penyakit dari database
$result = [];
foreach ($allPenyakit as $penyakit) {
    $kodeSolusi = $penyakit->kode_solusi;
    $rulesPenyakit = $rules->where('kode_solusi', $kodeSolusi);

    $totalBobotGejala = 0;
    $skorGejalaDipilih = 0;

    foreach ($rulesPenyakit as $rule) {
        $bobot = $rule->gejala->bobot_gejala ?? 1;

        $totalBobotGejala += $bobot;

        if (in_array($rule->gejala->kode_gejala, array_column($selectedGejalas, 'kode_gejala'))) {
            $skorGejalaDipilih += $bobot;
        }
    }

    $probabilitas = $totalBobotGejala > 0
        ? ($skorGejalaDipilih / $totalBobotGejala) * 100
        : 0;

    $result[] = [
        'penyakit' => $penyakit->penyakit,
        'definisi' => $penyakit->definisi ?? 'Tidak Tersedia',
        'solusi' => $penyakit->solusi ?? 'Tidak Tersedia',
        'probabilitas' => round($probabilitas, 2),
    ];
}

// Urutkan hasil berdasarkan probabilitas tertinggi
$result = collect($result)->sortByDesc('probabilitas')->toArray();

// Ambil hasil dengan probabilitas tertinggi
$topResult = reset($result); // Ambil elemen pertama dari hasil yang sudah diurutkan
        
        // Redirect ke halaman hasil diagnosis dengan data yang relevan
        return view('diagnosis.result', compact('topResult', 'selectedGejalasNames', 'totalSkor', 'result', 'pasiens'));
    }
    
}
