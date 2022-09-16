<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'id' => 1,
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'nationality_id' => 1,
                'country_id' => 2,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 1,
            ],
            [
                'id' => 2,
                'username' => 'test1',
                'email' => 'test1@test.com',
                'password' => Hash::make('password'),
                'nationality_id' => 3,
                'country_id' => 4,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 0,
            ],
            [
                'id' => 3,
                'username' => 'test2',
                'email' => 'test2@test.com',
                'password' => Hash::make('password'),
                'nationality_id' => 5,
                'country_id' => 6,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 0,
            ],
            [
                'id' => 4,
                'username' => 'test3',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
                'nationality_id' => 7,
                'country_id' => 8,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 0,
            ],
            [
                'id' => 5,
                'username' => 'test4',
                'email' => 'test4@test.com',
                'password' => Hash::make('password'),
                'nationality_id' => 9,
                'country_id' => 10,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 0,
            ],
            [
                'id' => 6,
                'username' => 'test5',
                'email' => 'test5@test.com',
                'password' => Hash::make('password'),
                'nationality_id' => 11,
                'country_id' => 12,
                'avatar' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus illum cum quam impedit dolore in placeat nam tempora rerum dolorum.',
                'is_admin' => 0,
            ],
        ]);
    }
}
