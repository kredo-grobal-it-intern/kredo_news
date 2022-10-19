<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;

class AutoPopulateApiCountryName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $countries = Country::all();

        foreach($countries as $country) {
            $lowercase_name = strtolower($country->name);
            if($lowercase_name == 'united states') {
                $country->api_name == 'united states of america';
            } else {
                $country->api_name = $lowercase_name;
            }
            $country->save();
        }
    }
}
