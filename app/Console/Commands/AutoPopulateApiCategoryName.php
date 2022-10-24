<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class AutoPopulateApiCategoryName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:fill';

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
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->api_name = strtolower($category->name);
            $category->save();
        }
    }
}
