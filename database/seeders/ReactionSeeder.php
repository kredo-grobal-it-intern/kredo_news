<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionSeeder extends Seeder
{
    public static function createRecords()
    {
        $records = [];
        $count = 1;
        for ($i=2; $i<=6; $i++) {
            for ($j=1; $j<=25; $j++) {
                $record = [
                    'id' => $count++,
                    'user_id' => $i,
                    'news_id' => $j,
                    'status' => rand(1, 2),
                ];
                $records[] = $record;
            }
        }
        return $records;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = self::createRecords();
        DB::table('reactions')->insert($records);
    }
}
