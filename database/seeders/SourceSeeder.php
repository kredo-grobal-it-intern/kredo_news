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
            ['id' => 1, 'name' => 'CNN'],
            ['id' => 2, 'name' => 'ASIA TIMES'],
            ['id' => 3, 'name' => 'BBC'],
            ['id' => 4, 'name' => 'africanews.'],
            ['id' => 5, 'name' => 'ABC'],

        ]);
    }
}
