<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkSeeder extends Seeder
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
        DB::table('bookmarks')->insert($records);
    }
}
