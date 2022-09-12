<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class NewsApiService
{
    protected $apiKey = "e2c15f49a33940c38f33ef2df85a4c75";

    public function getApiNews() {
        return Http::get('https://newsapi.org/v2/everything', [
            'apiKey' => $this->apiKey,
            'from' => Carbon::now()->format('Y-m-d'),
            'sortBy' => 'publishAt',
            'q' => 'Tesla'
        ])->object();
    }
}
