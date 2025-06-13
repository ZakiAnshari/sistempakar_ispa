<?php
namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('Front_end.Home'); // Mengirim data ke view menggunakan compact
    }

    public function registrasi()
    {
        return view('Front_end.registrasi');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $data = $request->validate([
            'name'     => 'required|string',       // Sesuaikan field ini dengan 'name' pada model
            'email'    => 'required|string|email', // Sesuaikan dengan 'email' pada model
            'password' => 'required|string|min:8', // Validasi password minimal 8 karakter
        ]);
    
        // Simpan data ke database dengan 'role_id' default 3
        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']), // Enkripsi password
            'role_id'  => 3, // Tetapkan role_id default menjadi 3
        ]);
    
        // Redirect ke halaman login
        return redirect('/login')->with([
            'success' => 'Pendaftaran telah berhasil disimpan',
        ]);

        
    }

    

    public function konsultasi()
    {
        $gejalas = Gejala::all();
        return view('Front_end.halaman_konsultasi', compact('gejalas'));
    }

}
