<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causes')->insert([[
            'type' => 'Deserción',
            'name' => 'Motivos Economicos',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'type' => 'Justificativo',
            'name' => 'Motivos Economicos',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'type' => 'Justificativo',
            'name' => 'Agresion Fisica',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'type' => 'Sanción',
            'name' => 'Agresion Verbal',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'type' => 'Sanción',
            'name' => 'No se',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}