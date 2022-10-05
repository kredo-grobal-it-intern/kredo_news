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
                'id' => 1,
                'name' => 'Politics',
                'image' => 'politics.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'id' => 2,
                'name' =>  'Bussiness',
                'image' => 'business.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'id' => 3,
                'name' => 'Sports',
                'image' => 'sports.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'id' => 4,
                'name' => 'Travel',
                'image' => 'travel.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'id' => 5,
                'name' => 'Health',
                'image' => 'health.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'id' => 6,
                'name' => 'Entertainment',
                'image' => 'entertainment.webp
                ',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
