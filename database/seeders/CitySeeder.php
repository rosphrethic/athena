<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([[
            'name' => 'Caraguatay',
            'acronym' => 'CTY',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Asunción',
            'acronym' => 'ASU',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Fernando de la Mora',
            'acronym' => 'FDO',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Capiatá',
            'acronym' => 'CAP',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'San Lorenzo',
            'acronym' => 'SL',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
