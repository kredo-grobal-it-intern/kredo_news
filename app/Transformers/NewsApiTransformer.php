<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class NewsApiTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($data)
    {
        return [
            'title' => $data->title,
            'description' => $data->description,
            'content' => $data->content,
            'author' => $data->author,
            'url' => $data->url,
            'image' => $data->urlToImage,
            'is_api' => 1,
            'published_at' => Carbon::parse($data->publishedAt)->format('Y-m-d')
        ];
    }
}
