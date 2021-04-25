<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guardians')->insert([[
            'city_id' => 1,
            'name' => 'Leon',
            'lastname' => 'Degree',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '39343943',
            'address' => '947 Chapmans Lane',
            'telephone' => '(0517)-194-395',
            'telephone_alternative' => '(0517)-194-391',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 2,
            'name' => 'Jill',
            'lastname' => 'McCready',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '8242949',
            'address' => '3555 Hall Street',
            'telephone' => '(0517)-729-583',
            'telephone_alternative' => '(0517)-729-582',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 2,
            'name' => 'Shanda',
            'lastname' => 'Crowl',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '9835827',
            'address' => '2980 Hill Street',
            'telephone' => '(0517)-573-483',
            'telephone_alternative' => '(0517)-573-483',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 1,
            'name' => 'Andrea',
            'lastname' => 'Bailey',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '5832757',
            'address' => '2186 Stratford Park',
            'telephone' => '(0517)-934-394',
            'telephone_alternative' => '(0517)-934-394',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 3,
            'name' => 'Rachel',
            'lastname' => 'Short',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '4837593',
            'address' => '3485 Camel Back Road',
            'telephone' => '(0517)-943-493',
            'telephone_alternative' => '(0517)-943-495',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 3,
            'name' => 'Russel',
            'lastname' => 'Milburn',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '9848334',
            'address' => 'Teniente Roja silva c/ Comandante Lara',
            'telephone' => '(0517)-729-583',
            'telephone_alternative' => '(0517)-729-586',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 1,
            'name' => 'Merle',
            'lastname' => 'Wright',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '8724284',
            'address' => '360 Ashcraft Court',
            'telephone' => '(0517)-573-483',
            'telephone_alternative' => '(0517)-573-487',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 4,
            'name' => 'Bradley',
            'lastname' => 'King',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '4983484',
            'address' => '1619 Commerce Boulevard',
            'telephone' => '(0517)-934-394',
            'telephone_alternative' => '(0517)-934-398',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 3,
            'name' => 'Carolyn',
            'lastname' => 'Spencer',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '9849244',
            'address' => '4974 Rocket Drive',
            'telephone' => '(0517)-729-583',
            'telephone_alternative' => '(0517)-729-589',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'city_id' => 1,
            'name' => 'William',
            'lastname' => 'Parsons',
            'document_type' => 'Cédula de Identidad',
            'document_number' => '6724784',
            'address' => '633 Rowes Lane',
            'telephone' => '(0517)-573-483',
            'telephone_alternative' => '(0517)-573-410',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
