<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use App\Models\Category;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\TestResponse;
use App\Transformers\NewsApiTransformer;
use Illuminate\Foundation\Testing\RefreshDatabase;


class NewsApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_api_transformer_data()
    {
       $this->seed([
            CategorySeeder::class,
            CountrySeeder::class
       ]);
        Http::fake([
            'https://newsdata.io/api/1/news?*' => Http::response(File::get(base_path('/tests/stubs/news-response.json'),200))
        ]);
        
        $api_news = Http::get(env("NEWS_API_BASE_URL"), [
            'apikey' => env("NEWS_API_KEY"),
            'language' => 'en',
        ])->object();

        $news = collect($api_news->results);

        $countries = Country::all();
        $categories = Category::all();
       
        $data = fractal()
            ->collection(collect($news))
            ->transformWith(new NewsApiTransformer($countries, $categories)) 
            ->toArray();
            

        $response = new TestResponse(response()->json($data));

        $response->assertJsonStructure((array) config('testing.responses.news_api'));
    
    }
}
