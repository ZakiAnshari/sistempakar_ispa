<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyakitController extends Controller
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
        $penyakits = Penyakit::paginate($paginate);
    
        // Mengirim data ke view menggunakan compact untuk lebih rapi
        return view('admin.penyakit.index', compact('penyakits', 'roles', 'user', 'paginate'));
    }

    public function cetak()
    {
        $penyakits = Penyakit::all(); // Ambil semua data pasien
        return view('admin.penyakit.cetak', compact('penyakits')); // Kirim data ke view cetak
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'penyakit' => 'required',
            'solusi' => 'required',
        ]);

        // Ambil kode solusi terakhir dan buat kode solusi baru
        $lastKode = Penyakit::max('kode_solusi');
        $nextKode = $this->generateNextKode($lastKode);

        // Simpan data ke dalam database
        Penyakit::create([
            'kode_solusi' => $nextKode,
            'penyakit' => $request->penyakit,
            'solusi' => $request->solusi,
        ]);

        // Redirect atau beri respon sukses
        return redirect()->back()->with('success', 'Penyakit berhasil ditambahkan!');
    }

    private function generateNextKode($lastKode)
    {
        if ($lastKode) {
            // Ambil angka dari kode terakhir dan tambahkan 1
            $number = intval(substr($lastKode, 1)) + 1;
            // Format kode dengan padding 0 hingga 3 digit
            return 'P' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada data sebelumnya, mulai dengan kode pertama
            return 'P001';
        }
    }


    public function edit($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role; // Mengambil role pengguna
        $penyakits = Penyakit::find($id); // Mengambil data lokasi surfing berdasarkan ID
    
        // Validasi apakah data ditemukan
        if (!$penyakits) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.penyakit.edit', compact('penyakits', 'user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $penyakits = Penyakit::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'penyakit' => 'required|string|max:255',
            'solusi' => 'required|string',
        ]);
    
        // Perbarui data di database
        $penyakits->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('penyakit.index')->with('success', 'Data Gejala  berhasil diperbarui.');
    }

    public function destroy($id)
    { 

        $penyakits = Penyakit::where('id',$id)->first();
        $penyakits->delete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }

    public function show($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role; // Mengambil role pengguna
        
        // Mengambil data penginapan berdasarkan ID
        $penyakits = Penyakit::findOrFail($id);
    
        // Menyediakan data ke view
        return view('admin.penyakit.show', compact('penyakits', 'user', 'roles'));
    }

}
