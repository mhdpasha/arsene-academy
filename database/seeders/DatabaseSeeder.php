<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nim' => 12501,
            'nama' => 'Muhamad Pasha Albara',
            'fakultas' => 'Informatika',
            'jurusan' => 'Teknik Informatika',
            'email' => 'pasha@gmail.com',
            'password' => Hash::make('pasha'),
            'telepon' => '085777511106',
            'status' => 1
        ]);
        User::create([
            'nim' => 12502,
            'nama' => 'Muhamad Hanafi',
            'fakultas' => 'Informatika',
            'jurusan' => 'Sistem Informasi',
            'email' => 'hanafi@gmail.com',
            'password' => Hash::make('hanafi'),
            'telepon' => '085778712389',
            'status' => 1
        ]);
    }
}
