<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BaccalaureateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('baccalaureates')->insert([[
            'name' => 'Bachillerato en Algo Nuevo',
            'acronym' => 'BAN',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Bachillerato en Ciencias Básicas',
            'acronym' => 'BCB',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Bachillerato en Ciencias Sociales',
            'acronym' => 'BCS',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Bachillerato Técnico en Informática',
            'acronym' => 'BTI',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Bachillerato en Artes',
            'acronym' => 'BA',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
