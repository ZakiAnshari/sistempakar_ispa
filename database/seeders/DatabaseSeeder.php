<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([

            UserSeeder::class,
            GejalaSeeder::class,
            PenyakitSeeder::class,
            RuleSeeder::class,

        ]);
    }
}
