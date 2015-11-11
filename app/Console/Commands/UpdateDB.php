<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Genre;
use App\Video;
use DB;

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

        // get all the videos with an IMDB ID
        $videos = Video::whereNotNull('imdb')->get();

        echo "\nUpdating....\n\n";

        // loop through all the videos
        foreach($videos as $video)
        {
            // get JSON data
            $json = file_get_contents($url . $video->imdb);
            $obj = json_decode($json);
            
            // update fields of the video with JSON data
            $video->product->name = $obj->Title;
            $video->poster = $obj->Poster;
            $video->release_year = $obj->Year;

            // save the video
            $video->save();

            // delete the products gnere
            DB::table('genre_product')->where('product_id', $video->product_id)->delete();

            // get the genres
            $genres = explode(',', $obj->Genre);
            foreach ($genres as $key => $genre)
                $genres[$key] = trim($genre);

            // add the genres
            foreach($genres as $genre)
            {
                // if genre does not exist create it
                $record = Genre::where('name', $genre)->first();
                if ($record === null)
                    $record = Genre::create(['name' => $genre]);

                // attatch genre to video
                $video->product->genres()->attach([$record->id]);
            }

            // log to screen
            echo $video->product_id . ". \t" . $video->product->name . " updated successfully.\n";
        }
    }
}
