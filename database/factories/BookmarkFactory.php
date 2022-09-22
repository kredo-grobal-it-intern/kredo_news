<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    private static $id = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => function () { return self::$id++; },
            'user_id' => rand(2, 6),
            'news_id' => rand(1, 25),        
        ];
    }
}
