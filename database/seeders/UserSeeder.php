<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Christopher',
            'lastname' => 'Quiñonez',
            'ci' => 5446888,
            'email' => 'christopher@charmed.dev',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Sean',
            'lastname' => 'Mcloughlin',
            'ci' => 9348244,
            'email' => 'sean@charmed.dev',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Felix',
            'lastname' => 'Kjellberg',
            'ci' => 3582395,
            'email' => 'felix@charmed.dev',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Mark',
            'lastname' => 'Fischbach',
            'ci' => 1853983,
            'email' => 'mark@charmed.dev',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Marzia',
            'lastname' => 'Kjellberg',
            'ci' => 6823859,
            'email' => 'marzia@charmed.dev',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}