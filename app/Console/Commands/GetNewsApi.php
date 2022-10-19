<?php

namespace App\Console\Commands;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Transformers\NewsApiTransformer;

class GetNewsApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get news using api'; 

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */

    public function handle()
    {
        $news = collect([]);
        $canFetch = true;
        $counter = 0;
        $nextPage = null;
        $countries = Country::all();
        $categories = Category::all();
        $api_news = null;
        while($canFetch) {
            $params = [
                'apiKey' => 'pub_1221269fcfaf2a306f63fea35bd2784ce9f4c',
                'language' => 'en',
                // 'category' => 'travel',
                // 'country' => 'us'
                // 'sources' => 'Business Insider South Africa',
                
            ];

            if($nextPage) {
                $params['page'] = $nextPage;
            } else {
                $canFetch = (!$counter) ? true : false;
            }
            $api_news = Http::get('https://newsdata.io/api/1/news', $params)->object();
            $news = $news->merge(collect($api_news->results));
            // dd($api_news);
            $nextPage = $api_news->nextPage ?? null;
            $counter++;

            if($counter == 3) {
                $canFetch = false;
            }
        }

        // $news = $news->filter(function($n) {
        //     return isset($n->content);
        // });

       
        $data = fractal() //This fractal is responsible for transforming our data. it is being install by a composer  (composer.json line 18)
            ->collection(collect($news))
            ->transformWith(new NewsApiTransformer($countries, $categories)) // if it does not have this line it makes many error deu to so many quarry //
            ->toArray();
            
        $filtered_news = collect($data['data'])->filter(function($news) {
            return $news->content;
        })->toArray();
        dd($filtered_news);
        News::insert($filtered_news['data']);
    }
}
