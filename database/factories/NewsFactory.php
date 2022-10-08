<?php

namespace Database\Factories;

use App\Models\Country;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    private static $id = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countries = Country::whereNotNull('continent' )->get(['id'])->toArray();
        $country_id = $countries[rand(0, count($countries) - 1)]['id'];
        $images = [
            'america.webp',
            'argentina.webp',
            'australia.webp',
            'brazil.webp',
            'canada.webp',
            'china.webp',
            'cuba.webp',
            'egypt.webp',
            'france.webp',
            'india.webp',
            'israel.webp',
            'japan.webp',
            'kenya.webp',
            'norway.webp',
            'philippines.webp',
            'russia.webp',
            'southafrica.webp',
            'spain.webp',
            'uk.webp',
        ];
        $image = $images[rand(0, count($images) - 1)];
        return [
            'id' => function () { return self::$id++; },
            'country_id' => $country_id,
            'category_id' => rand(1, 6),
            'source_id' => rand(1, 5),
            'title' => $this->faker->realText(50),
            'description' => $this->faker->realText(200),
            'content' => $this->faker->text(3000),
            'author' => $this->faker->name,
            'url' => $this->faker->url,
            'image' => $image,
            'published_at' => $this->faker->dateTimeBetween('-1 month', new DateTime()),
        ];
    }
}
