<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Data guru
        $teachers = [
            ['name' => 'Guru Satu', 'email' => 'guru1@example.com'],
            ['name' => 'Guru Dua', 'email' => 'guru2@example.com'],
            ['name' => 'Guru Tiga', 'email' => 'guru3@example.com'],
        ];

        foreach ($teachers as $teacher) {
            User::create([
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => Hash::make('password'), // Password default
                'role' => 'guru',
            ]);
        }

        // Data siswa
        $students = [
            ['name' => 'Siswa Satu', 'email' => 'siswa1@example.com'],
            ['name' => 'Siswa Dua', 'email' => 'siswa2@example.com'],
            ['name' => 'Siswa Tiga', 'email' => 'siswa3@example.com'],
            ['name' => 'Siswa Empat', 'email' => 'siswa4@example.com'],
            ['name' => 'Siswa Lima', 'email' => 'siswa5@example.com'],
        ];

        foreach ($students as $student) {
            User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password'), // Password default
                'role' => 'siswa',
            ]);
        }
    }
}
