<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([[
            'area_id' => 5,
            'name' => 'Química',
            'acronym' => 'QUI',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'area_id' => 1,
            'name' => 'Física',
            'acronym' => 'FIS',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'area_id' => 3,
            'name' => 'Informática',
            'acronym' => 'INF',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'area_id' => 1,
            'name' => 'Matemática',
            'acronym' => 'MAT',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'area_id' => 4,
            'name' => 'Castellano',
            'acronym' => 'CAS',
            'created_at' => now(),
            'updated_at' => now(),
        ], [

            'area_id' => 4,
            'name' => 'Guaraní',
            'acronym' => 'GUA',
            'created_at' => now(),
            'updated_at' => now(),
        ], [

            'area_id' => 5,
            'name' => 'Estadística',
            'acronym' => 'EST',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'area_id' => 4,
            'name' => 'Biología',
            'acronym' => 'BIO',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
