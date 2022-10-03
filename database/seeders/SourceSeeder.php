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
            ['id' => 2, 'name' => 'The Japan times', 'country_id' =>112],
            ['id' => 3, 'name' => 'EL PAIS', 'country_id' => 209],
            ['id' => 4, 'name' => 'Africannews', 'country_id' => 206],
            ['id' => 5, 'name' => 'Com. au', 'country_id' => 14],
            ['id' => 6, 'name' => 'BBC', 'country_id' => 235],
            ['id' => 7, 'name' => 'NBC', 'country_id' => 144],
            ['id' => 8, 'name' => 'Yonhap news', 'country_id' => 119],
            ['id' => 9, 'name' => 'CBC', 'country_id' => 40],
            ['id' => 10, 'name' => 'S.PAULO', 'country_id' => 32],
            ['id' => 11, 'name' => 'RAPPLER', 'country_id' => 175],
            ['id' => 12, 'name' => 'SPUTNIK', 'country_id' => 183],
            ['id' => 13, 'name' => 'AFPBB', 'country_id' => 76],
            ['id' => 14, 'name' => 'Asian times', 'country_id' => 46],
            ['id' => 15, 'name' => 'MIG', 'country_id' => 103],
            ['id' => 16, 'name' => 'The Times of Israel', 'country_id' => 109],
            ['id' => 17, 'name' => 'NORR', 'country_id' => 166],
            ['id' => 18, 'name' => 'Ukrinform', 'country_id' => 233],
            ['id' => 19, 'name' => 'Egypt Today', 'country_id' => 66],
            ['id' => 20, 'name' => 'Media Council of Kenya', 'country_id' => 206],

        ]);
    }
}
