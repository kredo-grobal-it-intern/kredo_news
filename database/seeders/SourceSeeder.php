<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([

            ['id' => 1, 'name' => 'CNN', 'country_id' => 236],
            ['id' => 2, 'name' => 'ASIA TIMES', 'country_id' => 112],
            ['id' => 3, 'name' => 'BBC', 'country_id' => 235],
            ['id' => 4, 'name' => 'africanews.', 'country_id' => 206],
            ['id' => 5, 'name' => 'ABC', 'country_id' => 14],
        ]);
    }
}
