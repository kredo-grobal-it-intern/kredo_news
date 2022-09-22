<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    public static function createRecords()
    {
        $records = [];
        for ($i=2; $i<=6; $i++) {
            for ($j=2; $j<=6; $j++) {
                $record = [
                    'follower_id'  => $i,
                    'following_id' => $j,
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
        DB::table('follows')->insert($records);
    }
}
