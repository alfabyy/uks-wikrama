<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('bismillahsecret'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Petugas UKS',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('secret12435'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'Andriana Rizki',
            'email' => 'petugas1@gmail.com',
            'password' => Hash::make('riski123'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'Visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'visitor',
        ]);
    }
}
