<?php

namespace App\Transformers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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

    protected  $countries = null;
    protected  $categories = null;

    public function __construct($countries_data, $categories_data)
    {
        $this->countries = $countries_data;
        $this->categories = $categories_data;
    }
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($data)
    {
        $countryName = $data->country[0];
        $categoryName = $data->category[0];

        $affiliated_country = $this->countries->filter(function($country) use($countryName) {
            return  $country->api_name == $countryName;
        })->first();

        $affiliated_category = $this->categories->filter(function($category) use($categoryName) {
            return  $category->api_name == $categoryName;
        })->first();

        return [
            'title' => $data->title,
            'country_id' => $affiliated_country ? $affiliated_country->id : null,
            'category_id' => $affiliated_category ? $affiliated_category->id : null,
            'description' => $data->description,
            'content' => $data->content,
            'author' => $data->creator ? $data->creator[0] : null,
            'url' => $data->link,
            'image' => $data->image_url,
            'is_api' => 1,
            'published_at' => Carbon::parse($data->pubDate)->format('Y-m-d')
        ];
    }
}
