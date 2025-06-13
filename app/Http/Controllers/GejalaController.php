<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use Auth;

class GejalaController extends Controller
{
    // Menampilkan halaman index gejala
    public function index(Request $request)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();
        $roles = $user->role;

        // Mengambil jumlah item per halaman dari parameter request (default 10)
        $paginate = $request->input('itemsPerPage', 10);

        // Mengambil data gejala dengan paginasi
        $gejalas = Gejala::paginate($paginate);

        // Mengirim data ke view
        return view('admin.gejala.index', compact('gejalas', 'roles', 'user', 'paginate'));
    }

    // Menampilkan data gejala untuk dicetak
    public function cetak()
    {
        $gejalas = Gejala::all(); // Ambil semua data gejala
        return view('admin.gejala.cetak', compact('gejalas'));
    }

    // Menyimpan data gejala baru
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_gejala' => 'required|string|max:255',
            'bobot_gejala' => 'required|string|max:10',
        ]);

        // Membuat kode gejala baru
        $lastKode = Gejala::max('kode_gejala');
        $nextKode = $this->generateNextKode($lastKode);

        // Simpan data ke database
        Gejala::create([
            'kode_gejala' => $nextKode,
            'nama_gejala' => $validated['nama_gejala'],
            'bobot_gejala' => $validated['bobot_gejala'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan!');
    }

    // Fungsi untuk membuat kode gejala berikutnya
    private function generateNextKode($lastKode)
    {
        if ($lastKode) {
            $number = intval(substr($lastKode, 1)) + 1;
            return 'G' . str_pad($number, 3, '0', STR_PAD_LEFT);
        }

        return 'G001';
    }

    // Menampilkan halaman edit gejala
    public function edit($id)
    {
        $user = Auth::user();
        $roles = $user->role;

        // Ambil data gejala berdasarkan ID
        $gejalas = Gejala::find($id);

        if (!$gejalas) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.gejala.edit', compact('gejalas', 'user', 'roles'));
    }

    // Memperbarui data gejala
    public function update(Request $request, $id)
    {
        $gejala = Gejala::findOrFail($id);

        // Validasi data
        $validated = $request->validate([
            'nama_gejala' => 'required|string|max:255',
            'bobot_gejala' => 'required|string|max:10',
        ]);

        // Perbarui data gejala
        $gejala->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil diperbarui.');
    }

    // Menghapus data gejala
    public function destroy($id)
    {
        try {
            $gejala = Gejala::findOrFail($id);
            $gejala->delete();

            return redirect()->back()->with('success', 'Data gejala berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
