<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_users')->insert([[
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 2,
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 3,
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 4,
            'role_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'user_id' => 5,
            'role_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
