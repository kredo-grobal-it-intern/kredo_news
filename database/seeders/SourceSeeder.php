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
            ['name' => 'CNN'],
            ['name' => 'ASIA TIMES'],
            ['name' => 'BBC'],
            ['name' => 'afrecanews.'],
            ['name' => 'ABC'],

        ]);
    }
}
