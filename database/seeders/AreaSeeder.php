<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([[
            'name' => 'Ciencias Naturales',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Estudios Sociales',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Tecnología',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Lengua y Literatura',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Matematicas',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
