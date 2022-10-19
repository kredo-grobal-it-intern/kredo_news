<?php

namespace App\Console\Commands;

use App\Models\Source;
use Illuminate\Console\Command;

class AutoPopulateApiSourceName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'source:fill';

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
        $sources = Source::all();

        foreach ($sources as $source) {
            $source->api_name = strtolower($source->name);
            $source->save();
        }
    }
}
