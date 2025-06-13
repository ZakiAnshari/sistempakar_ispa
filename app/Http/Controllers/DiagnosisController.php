<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use Illuminate\Http\Request;
use App\Services\ForwardChaining;

class DiagnosisController extends Controller
{
    public function diagnose(Request $request)
    {
        // Ambil input gejala dari user
        $inputGejala = $request->input('gejala'); // Array ['kode_gejala1', 'kode_gejala2', ...]

        // Ambil semua data gejala dari database
        $gejala = Gejala::whereIn('kode_gejala', $inputGejala)->get();

        // Hitung skor berdasarkan bobot gejala dan nilai gejala yang diberikan
        $totalSkor = 0;
        foreach ($gejala as $item) {
            $nilai = $request->input('nilai')[$item->kode_gejala] ?? 1; // Default nilai = 1
            $totalSkor += $item->bobot_gejala * $nilai;
        }

        // Ambil aturan inferensi (rules)
        $rules = Rule::with(['solusi', 'gejala'])->get();

        // Analisis data untuk diagnosis
        $hasilDiagnosis = [];
        foreach ($rules as $rule) {
            $gejalaRule = $rule->gejala->pluck('kode_gejala')->toArray();

            // Cocokkan gejala user dengan gejala aturan
            if (array_intersect($inputGejala, $gejalaRule) === $gejalaRule) {
                $hasilDiagnosis[] = $rule->solusi;
            }
        }

        // Hitung probabilitas diagnosis
        $totalGejala = Gejala::count();
        $probabilitas = [];
        foreach ($hasilDiagnosis as $penyakit) {
            $gejalaPenyakit = Rule::where('kode_solusi', $penyakit->kode_solusi)->count();
            $probabilitas[$penyakit->penyakit] = ($gejalaPenyakit / $totalGejala) * 100;
        }

        return view('diagnosis.result', compact('totalSkor', 'hasilDiagnosis', 'probabilitas'));
    }

    
}
