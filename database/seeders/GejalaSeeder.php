<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengisi data gejala, riwayat kesehatan, dan nutrisi terkait ISPA pada balita
        $gejalaData = [
            // Gejala
            [
                'nama_gejala' => 'Apakah anak Anda mengalami demam belakangan ini?',
                'kode_gejala' => 'G001',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda sering batuk atau terdengar batuk-batuk saat tidur?',
                'kode_gejala' => 'G002',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda mengalami pilek atau hidung berair?',
                'kode_gejala' => 'G003',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda terlihat kesulitan bernapas atau mengalami sesak napas?',
                'kode_gejala' => 'G004',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah mata anak Anda terlihat merah atau berair?',
                'kode_gejala' => 'G005',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda mengeluhkan sakit tenggorokan atau terlihat kesulitan menelan?',
                'kode_gejala' => 'G006',
                'bobot_gejala' => 1
            ],
            // Tambahkan data lain dengan bobot sesuai
            [
                'nama_gejala' => 'Apakah suara anak Anda terdengar serak atau berbeda dari biasanya?',
                'kode_gejala' => 'G007',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda pernah mengalami muntah belakangan ini?',
                'kode_gejala' => 'G008',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah suara anak Anda terdengar bengek saat bernapas?',
                'kode_gejala' => 'G009',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah hidung anak Anda sering terlihat tersumbat?',
                'kode_gejala' => 'G010',
                'bobot_gejala' => 1
            ],
            // Riwayat Kesehatan
            [
                'nama_gejala' => 'Apakah anak Anda memiliki riwayat alergi, seperti alergi debu atau makanan tertentu?',
                'kode_gejala' => 'R001',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda sering terpapar asap rokok di rumah atau lingkungan sekitar?',
                'kode_gejala' => 'R002',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Bagaimana kondisi lingkungan tempat tinggal Anda? Apakah terdapat banyak polusi udara?',
                'kode_gejala' => 'R003',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda pernah menjalani rawat inap sebelumnya karena gangguan pernapasan?',
                'kode_gejala' => 'R004',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda sudah mendapatkan imunisasi lengkap, terutama untuk campak dan influenza?',
                'kode_gejala' => 'R005',
                'bobot_gejala' => 1
            ],
            // Nutrisi
            [
                'nama_gejala' => 'Bagaimana status gizi anak Anda? Apakah berat badannya sesuai dengan usia?',
                'kode_gejala' => 'N001',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda sering mengonsumsi makanan kaya vitamin A, seperti wortel, bayam, atau ubi?',
                'kode_gejala' => 'N002',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda sering makan buah-buahan yang mengandung vitamin C, seperti jeruk, mangga, atau kiwi?',
                'kode_gejala' => 'N003',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda mengonsumsi cukup sayur dan buah setiap hari?',
                'kode_gejala' => 'N004',
                'bobot_gejala' => 1
            ],
            [
                'nama_gejala' => 'Apakah anak Anda mengonsumsi makanan tinggi protein, seperti telur, ikan, ayam, atau tahu?',
                'kode_gejala' => 'N005',
                'bobot_gejala' => 1
            ]
        ];

        foreach ($gejalaData as $data) {
            Gejala::create($data);
        }
    }

        
    

    
    
}
