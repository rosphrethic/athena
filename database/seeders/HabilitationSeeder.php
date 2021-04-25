<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HabilitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habilitations')->insert([[
            'user_id' => 1,
            'course_id' => 1,
            'subject_id' => 1,
            'modality' => 'Presencial',
            'required' => 1,
            'hour_weekly' => 8,
            'average_required' => 80,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'course_id' => 1,
            'subject_id' => 2,
            'modality' => 'Presencial',
            'required' => 1,
            'hour_weekly' => 8,
            'average_required' => 80,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'course_id' => 1,
            'subject_id' => 3,
            'modality' => 'Presencial',
            'required' => 1,
            'hour_weekly' => 8,
            'average_required' => 80,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
