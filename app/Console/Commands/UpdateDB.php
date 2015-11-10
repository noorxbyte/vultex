<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Video;

class UpdateDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update records based on IMDB ID using OMDB API.';

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
     * @return mixed
     */
    public function handle()
    {
        $url = "http://omdbapi.com/?i=";

        // get all the records with an IMDB ID
        $records = Video::whereNotNull('imdb')->get();

        echo "\nUpdating....\n\n";

        // loop through all the records
        foreach($records as $record)
        {
            // get JSON data
            $json = file_get_contents($url . $record->imdb);
            $obj = json_decode($json);
            
            // update fields of the record with JSON data
            $record->release_year = $obj->Year;
            $record->genre = $obj->Genre;

            // save the record
            $record->save();

            // log to screen
            echo $record->product_id . ". \t" . $record->product->name . " updated successfully.\n";
        }
    }
}
