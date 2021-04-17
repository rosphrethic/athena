<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->insert([[
            'name' => 'Paraguayo',
            'acronym' => 'PY',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Estadounidense',
            'acronym' => 'US',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Canadiense',
            'acronym' => 'CAN',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Japones',
            'acronym' => 'JP',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Ruso',
            'acronym' => 'RS',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
