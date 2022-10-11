<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Transformers\NewsApiTransformer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetNewsApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:create {category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'description api';

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
        $api_news = Http::get('https://newsapi.org/v2/everything', [
            'apiKey' => 'e2c15f49a33940c38f33ef2df85a4c75',
            'from' => Carbon::now()->format('Y-m-d'),  //This Carbon handle the date formating//
            'sortBy' => 'publishAt',
            // 'sources' => 'Business Insider South Africa',
            // 'category' => 'travel',
            'q' => 'travel'  //query string//
        ])->object();

        $data = fractal() //This fractal is responsible for transforming our data. it is being install by a composer  (composer.json line 18)
            ->collection(collect($api_news->articles))
            ->transformWith(new NewsApiTransformer()) // if it does not have this line it makes many error deu to so many quarry //
            ->toArray();

        News::insert($data['data']);
    }
}
