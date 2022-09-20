<?php

namespace App\Http\Controllers;

use App\Services\NewsApiService;

class ApiController extends Controller
{
    public function getApiNews()
    {
        $apiService = new NewsApiService();
        return response()->json($apiService->getApiNews()->articles);
    }
}
