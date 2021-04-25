<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) { 
            DB::table('schedules')->insert([[
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'user_id' => 1,
                'course_id' => $i,
                'hour' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
        }
    }
}
