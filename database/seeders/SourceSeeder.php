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

            ['id' => 1, 'name' => 'BBC', 'country_id' => 225],
            ['id' => 2, 'name' => 'NBC', 'country_id' =>144],
            ['id' => 3, 'name' => 'The Japan times', 'country_id' => 112],
            ['id' => 4, 'name' => 'Yonhap news.', 'country_id' => 118],
            ['id' => 5, 'name' => 'Com. au', 'country_id' => 14],
            ['id' => 6, 'name' => 'CBC', 'country_id' => 40],
            ['id' => 7, 'name' => 'S.PAULO', 'country_id' => 32],
            ['id' => 8, 'name' => 'RAPPLER', 'country_id' => 175],
            ['id' => 9, 'name' => 'CNN', 'country_id' => 236],
            ['id' => 10, 'name' => 'SPUTNIK', 'country_id' => 183],
            ['id' => 11, 'name' => 'AFPBB', 'country_id' => 76],
            ['id' => 12, 'name' => 'Asian times', 'country_id' => 46],
            ['id' => 13, 'name' => 'EL PAIS', 'country_id' => 209],
            ['id' => 14, 'name' => 'Africannews', 'country_id' => 206],
            ['id' => 14, 'name' => 'NORR', 'country_id' => 166],
            ['id' => 14, 'name' => 'The Times of Israel', 'country_id' => 109],
            ['id' => 14, 'name' => 'MIG', 'country_id' => 103],
            ['id' => 14, 'name' => 'Egypt Today', 'country_id' => 66],
            ['id' => 14, 'name' => 'Media Council of Kenya', 'country_id' => 116],
        ]);
    }
}
