<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Series;
use App\Movie;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Welcome";
        $heading = "Welcome";

        $movies = Product::where('type', 'MOVIE');
        $series = Product::where('type', 'SERIES');
        $anime = Product::where('type', 'ANIME');
        $video = Product::where('type', 'VIDEO');

        // query
        if (!empty($request->q))
        {
            $title = "Search Database";
            $heading = "Search: '$request->q'";

            $movies = $movies->where('name', 'LIKE', "%$request->q%");
            $series = $series->where('name', 'LIKE', "%$request->q%");
            $anime = $anime->where('name', 'LIKE', "%$request->q%");
            $video = $video->where('name', 'LIKE', "%$request->q%");
        }

        $request->flash();

        return view('pages.index')
            ->with('title', $title)
            ->with('heading', $heading)
            ->with('movies', $movies->with('video')->orderBy('updated_at', 'DESC')->get())
            ->with('series', $series->with('video')->orderBy('updated_at', 'DESC')->get())
            ->with('anime', $anime->with('video')->orderBy('updated_at', 'DESC')->get())
            ->with('video', $video->with('video')->orderBy('updated_at', 'DESC')->get());
    }
}
