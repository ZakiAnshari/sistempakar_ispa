<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\DaftarPasienController;
use App\Http\Controllers\DiagnosisReportController;
use App\Http\Controllers\ForwardChainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Front_End
Route::get('/', [HomeController::class, 'home']);
Route::get('/konsultasi', [HomeController::class, 'konsultasi']);

Route::get('/register', [HomeController::class, 'registrasi'])->name('register');
Route::post('/register', [HomeController::class, 'store'])->name('register.store');

// Route::post('pasien-add', [PasienController::class, 'store'])->name('pasien-add');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticating']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
    //DAFTAR PASIEN
    Route::get('learn/daftar-pasien', [DaftarPasienController::class, 'index'])->name('daftar-pasien.index');
    Route::post('learn/daftar-pasien', [DaftarPasienController::class, 'store'])->name('daftar-pasien-add');
    Route::get('learn/logout', [DaftarPasienController::class, 'logout']);

    //PERTANYAAN
    Route::get('learn/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
    
    //GEJALA
    Route::get('admin/gejala', [GejalaController::class, 'index'])->name('gejala.index');
    Route::post('admin/gejala-add', [GejalaController::class, 'store']);
    Route::get('admin/gejala-edit/{id}', [GejalaController::class, 'edit']);
    Route::post('admin/gejala-edit/{id}', [GejalaController::class, 'update']);
    Route::get('admin/gejala-destroy/{id}', [GejalaController::class, 'destroy']);
    Route::get('admin/gejala/cetak', [GejalaController::class, 'cetak'])->name('gejala.cetak');

    //PASIEN
    Route::get('admin/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('admin/pasien/cetak', [PasienController::class, 'cetak'])->name('pasien.cetak');

    Route::get('admin/pasien-destroy/{id}', [PasienController::class, 'destroy']);
    //PENYAKIT
    Route::get('admin/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
    Route::post('admin/penyakit-add', [PenyakitController::class, 'store']);
    Route::get('admin/penyakit-edit/{id}', [PenyakitController::class, 'edit']);
    Route::post('admin/penyakit-edit/{id}', [PenyakitController::class, 'update']);
    Route::get('admin/penyakit-destroy/{id}', [PenyakitController::class, 'destroy']);
    Route::get('admin/penyakit-show/{id}', [PenyakitController::class, 'show']);
    Route::get('admin/penyakit/cetak', [PenyakitController::class, 'cetak'])->name('penyakit.cetak');

    //RULE
    Route::get('admin/rule', [RuleController::class, 'index'])->name('rule.index');
    Route::post('admin/rule-add', [RuleController::class, 'store']);
    Route::get('admin/rule-destroy/{id}', [RuleController::class, 'destroy']);

    //LAPORAN
    Route::post('/store-report', [DiagnosisReportController::class, 'store'])->name('store.report');
    Route::get('/diagnosis-reports', [DiagnosisReportController::class, 'index'])->name('diagnosis.reports');

    // LAPORAN DIAGNOSA
    Route::get('admin/diagnosa', [laporanController::class, 'index'])->name('diagnosa.index');
    Route::get('admin/diagnosa/cetak', [laporanController::class, 'cetak'])->name('diagnosa.cetak');

    // USER
    Route::get('admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/user-destroy/{id}', [UserController::class, 'destroy']);
});

Route::get('/diagnosis', [ForwardChainingController::class, 'form'])->name('diagnosis.form');
Route::post('/diagnose', [ForwardChainingController::class, 'diagnose'])->name('diagnose');
