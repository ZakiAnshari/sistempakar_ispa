<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $users = User::all();

        // Mengirim data ke view menggunakan compact untuk lebih rapi
        return view('admin.user.index', compact('roles', 'user', 'paginate','users'));
    }

    public function destroy($id)
    { 

        $users = User::where('id',$id)->first();
        $users->delete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }
}
