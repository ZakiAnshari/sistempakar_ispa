<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Karyawan'],
            ['name' => 'pengunjung'],
        ];
        foreach ($roles as $role) {
            Roles::create($role);
        }
    
        // Create users
        $users = [
            [
                'name' => 'admin',
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'karyawan',
                'role_id' => 2,
                'email' => 'karyawan@gmail.com',
                'password' => bcrypt('123')
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
