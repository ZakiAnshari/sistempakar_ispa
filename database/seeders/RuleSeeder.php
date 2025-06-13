<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengisi data aturan (rules) terkait ISPA pada balita
        $ruleData = [
            // ISPA RINGAN - Demam, Batuk, Pilek
        
            // [
            //     'kode_solusi' => 'P002', 
            //     'kode_gejala' => 'G005', 
            // ],
            // [
            //     'kode_solusi' => 'P002', 
            //     'kode_gejala' => 'G006', 
            // ],
            // [
            //     'kode_solusi' => 'P002', 
            //     'kode_gejala' => 'G010', 
            // ],
            // [
            //     'kode_solusi' => 'P002', 
            //     'kode_gejala' => 'R004', 
            // ],
            // [
            //     'kode_solusi' => 'P002', 
            //     'kode_gejala' => 'N005', 
            // ],
        ];
    
        // Iterasi melalui setiap data aturan dan simpan ke database
        foreach ($ruleData as $data) {
            Rule::create($data); // Menggunakan model Rule untuk menyimpan data
        }
    }
    

}
