<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([[
            'name' => '7mo',
            'name_number' => '7',
            'name_text' => 'Séptimo',
            'name_alternative' => 'Séptimo Grado',
            'level' => 'Educación Escolar Básica',
            'level_acronym' => 'EEB',
            'has_baccalaureate' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '8vo',
            'name_number' => '8',
            'name_text' => 'Octavo',
            'name_alternative' => 'Octavo Grado',
            'level' => 'Educación Escolar Básica',
            'level_acronym' => 'EEB',
            'has_baccalaureate' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '9',
            'name_number' => '9',
            'name_text' => 'Noveno',
            'name_alternative' => 'Noveno Grado',
            'level' => 'Educación Escolar Básica',
            'level_acronym' => 'EEB',
            'has_baccalaureate' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '1er',
            'name_number' => '1',
            'name_text' => 'Primero',
            'name_alternative' => 'Primer Curso',
            'level' => 'Educación Media',
            'level_acronym' => 'EM',
            'has_baccalaureate' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '2do',
            'name_number' => '2',
            'name_text' => 'Segundo',
            'name_alternative' => 'Segundo Curso',
            'level' => 'Educación Media',
            'level_acronym' => 'EM',
            'has_baccalaureate' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '3ro',
            'name_number' => '3',
            'name_text' => 'Tercero',
            'name_alternative' => 'Tercer Curso',
            'level' => 'Educación Media',
            'level_acronym' => 'EM',
            'has_baccalaureate' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}