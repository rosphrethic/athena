<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([[
            'name' => 'Caraguatay',
            'acronym' => 'CTY',
            'telephone' => '(0517)222-440',
            'address' => 'Teniente Roja Silva con Ruta Caraguatay 733',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Capiata',
            'acronym' => 'CAP',
            'telephone' => '(0021)385-385',
            'address' => 'Teniente Roja Silva con Ruta 733',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
