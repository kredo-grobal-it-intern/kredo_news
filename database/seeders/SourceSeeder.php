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
            ['name' => 'BBC'],
            ['name' => 'NBC'],
            ['name' => 'Japan Times'],
            ['name' => 'VOX'],
            ['name' => 'ABC'],
            ['name' => 'TIME'],
            ['name' => 'AP NEWS'],
            ['name' => 'The Guardian'],
        ]);
    }
}
