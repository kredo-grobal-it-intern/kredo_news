<?php

namespace Database\Factories;

use App\Models\Country;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
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
            'america.jpg',
            'argentina.jpg',
            'australia.jpg',
            'brazil.jpg',
            'canada.jpg',
            'china.jpg',
            'cuba.jpg',
            'egypt.jpg',
            'france.jpg',
            'india.jpg',
            'israel.jpg',
            'japan.jpg',
            'kenya.jpg',
            'norway.jpg',
            'philippines.jpg',
            'russia.jpg',
            'southafrica.jpg',
            'spain.jpg',
            'uk.jpg',
        ];
        $image = $images[rand(0, count($images) - 1)];
        return [
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
