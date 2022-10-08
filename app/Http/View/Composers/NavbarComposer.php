<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Source;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        $all_categories = Category::select('id', 'name')->get();
        $all_countries = Country::select('id', 'name', 'continent')->get();
        $all_sources = Source::select('id', 'name', 'country_id')->get();
        $continents = [ 'America','Asia','Europe','Oceania','Africa' ];
        $view->with('all_categories', $all_categories)
            ->with('all_countries', $all_countries)
            ->with('all_sources', $all_sources)
            ->with('continents', $continents);
    }
}
