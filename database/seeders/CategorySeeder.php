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
                'image' => 'politics.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' =>  'Bussiness',
                'image' => 'business.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Sports',
                'image' => 'sports.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Travel',
                'image' => 'travel.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Health',
                'image' => 'health.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Entertainment',
                'image' => 'entertainment.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
