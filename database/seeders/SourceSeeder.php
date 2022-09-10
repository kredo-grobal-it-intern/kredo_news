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
            ['name' => 'CNN', 'country_id' => 236],
            ['name' => 'ASIA TIMES', 'country_id' => 112],
            ['name' => 'BBC', 'country_id' => 235],
            ['name' => 'africanews.', 'country_id' => 206],
            ['name' => 'ABC', 'country_id' => 14],

        ]);
    }
}
