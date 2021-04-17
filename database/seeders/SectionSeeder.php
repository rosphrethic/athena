<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([[
            'name' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'B',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'C',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
