<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuleController extends Controller
{
    public function index(Request $request)
{
    // Mendapatkan pengguna yang sedang login
    $user = Auth::user();
    // Mengambil role pengguna
    $roles = $user->role;

    // Mengambil jumlah item per halaman dari parameter request atau default ke 10
    $paginate = $request->input('itemsPerPage', 50);

    // Mengambil data rules dengan relasi gejala dan solusi
    $rules = Rule::with(['gejala', 'solusi'])->paginate($paginate);

    // Mengambil data penyakit dan gejala untuk kebutuhan form
    $penyakits = Penyakit::all();
    $gejalas = Gejala::all();

    // Mengirim data ke view menggunakan compact untuk lebih rapi
    return view('admin.rule.index', compact('rules', 'roles', 'user', 'penyakits', 'gejalas'));
}



    public function store(Request $request)
    {
      
        $request->validate([
            'kode_solusi' => 'required|exists:penyakits,kode_solusi',
            'kode_gejala' => 'required|exists:gejalas,kode_gejala',
        ]);

        Rule::create($request->all());
          // Redirect atau beri respon sukses
          return redirect()->back()->with('success', 'Rule berhasil ditambahkan!');
    }
    public function destroy($id)
    { 

        $rules = Rule::where('id',$id)->first();
        $rules->delete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }
}
