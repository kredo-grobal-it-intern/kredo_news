<?php

namespace App\Console\Commands;

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
    protected $signature = 'api:create';

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
     * @return int
     */
    public function handle()
    {
        $api_news = Http::get('https://newsapi.org/v2/everything', [
            'apiKey' => 'e2c15f49a33940c38f33ef2df85a4c75',
            'from' => Carbon::now()->format('Y-m-d'),  //This Carbon handle the date formating//
            'sortBy' => 'publishAt',
            'q' => 'travel'  //query string//
        ])->object();
        $data =fractal()->collection($api_news)->transformWith(NewsApiTransformer::class);
        dd($data);
    }
}
