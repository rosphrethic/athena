<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([[
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 1,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 2,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 3,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);

        DB::table('courses')->insert([[
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 4,
            'baccalaureate_id' => 1,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 5,
            'baccalaureate_id' => 1,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 1,
            'branch_id' => 1,
            'grade_id' => 6,
            'baccalaureate_id' => 1,
            'section_id' => 1,
            'year' => '2021',
            'shift' => 'Mañana',
            'start_date' => now(),
            'end_date' => '2021/11/11',
            'tuition_fee' => '40000',
            'installment_fee' => '20000',
            'installment_quantity' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
