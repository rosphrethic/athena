<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CompanyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies_data')->insert([
            'name' => "Colegio Privado 'Athena'",
            'name_administration' => 'Secretaría de Administración',
            'slogan' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'founder' => 'Christopher Quiñonez Cespedes',
            'emblem' => 'emblem.png',
            'foundation_date' => '1997/12/7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
