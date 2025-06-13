<?php

namespace App\Services;

use App\Models\Rule;

class ForwardChaining
{
    protected $gejalas;
    protected $rules;

    public function __construct($gejalas)
    {
        $this->gejalas = $gejalas;  // Gejala yang dipilih
        $this->rules = Rule::with('penyakit', 'gejala')->get(); // Ambil semua aturan
    }

    public function proses()
{
    $penyakitDitemukan = [];

    // Pastikan gejala tidak kosong
    if (empty($this->gejalas) || count($this->gejalas) === 0) {
        return $penyakitDitemukan; // Jika tidak ada gejala, langsung return kosong
    }

    // Proses Forward Chaining
    foreach ($this->rules as $rule) {
        $matchedGejala = 0;
        foreach ($this->gejalas as $inputGejala) {
            if ($rule->gejala_id == $inputGejala->id) {
                $matchedGejala++;
            }
        }

        // Jika gejala cocok dengan aturan
        if ($matchedGejala == count($this->gejalas)) {
            $penyakitDitemukan[] = $rule->penyakit;
        }
    }

    return $penyakitDitemukan;
}

}
