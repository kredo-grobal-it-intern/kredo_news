<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Politics',
                'image' => 'politics.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' =>  'Bussiness',
                'image' => 'business.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Sports',
                'image' => 'sports.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Travel',
                'image' => 'travel.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Health',
                'image' => 'health.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Entertainment',
                'image' => 'entertainment.png',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
