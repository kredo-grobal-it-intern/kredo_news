<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 1,
                'country_id' => 2,
                'avatar' => null,
                'is_admin' => 1,
            ],
            [
                'username' => 'test1',
                'email' => 'test1@test.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 3,
                'country_id' => 4,
                'avatar' => null,
                'is_admin' => 0,
            ],
            [
                'username' => 'test2',
                'email' => 'test2@test.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 5,
                'country_id' => 6,
                'avatar' => null,
                'is_admin' => 0,
            ],
            [
                'username' => 'test3',
                'email' => 'test3@test.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 7,
                'country_id' => 8,
                'avatar' => null,
                'is_admin' => 0,
            ],
            [
                'username' => 'test4',
                'email' => 'test4@test.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 9,
                'country_id' => 10,
                'avatar' => null,
                'is_admin' => 0,
            ],
            [
                'username' => 'test5',
                'email' => 'test5@test.com',
                'password' => '$2y$10$/93rusPiXTLyfwPPtP.kFezTruK0F71PXkTmmdiOf0TAsoJ0hSlVe',
                'nationality_id' => 11,
                'country_id' => 12,
                'avatar' => null,
                'is_admin' => 0,
            ],
        ]);
    }
}
