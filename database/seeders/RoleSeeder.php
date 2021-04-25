<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'Administrador',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Director',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Secretario',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Docente',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Estudiante',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
