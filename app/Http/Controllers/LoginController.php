<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('Front_end.login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'name'     => ['required'], // Validasi untuk name
            'password' => ['required'], // Validasi untuk password
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk mencegah serangan session fixation
            $request->session()->regenerate();

            // Dapatkan user yang sedang login
            $user = Auth::user();

            // Redirect based on role_id
            if (in_array($user->role_id, [1, 2])) {
                return redirect('/admin/dashboard')->with('success', 'Login Berhasil');
            } else {
                return redirect('/learn/daftar-pasien')->with('success', 'Login Berhasil');
            }

            // Default redirect jika role_id tidak dikenali (opsional)
            return redirect('/login')->with('error', 'Akses tidak diizinkan');
        }

        // Jika autentikasi gagal
        Session::flash('toast_error', 'Login gagal');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
