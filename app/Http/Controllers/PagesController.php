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
        $movies = Product::where('type', 'MOVIE');
        $series = Product::where('type', 'SERIES');

        $title = "Welcome";
        $heading = "Welcome";

        // query
        if (!empty($request->q))
        {
            $title = "Search Database";
            $heading = "Search: '$request->q'";

            $movies = $movies
                ->where('name', 'LIKE', '%' . $request->q . '%')
                ->orWhere('description', 'LIKE', "%$request->q%")
                ->with('movie')->get();

            $series = $series
                ->where('name', 'LIKE', '%' . $request->q . '%')
                ->orWhere('description', 'LIKE', "%$request->q%")
                ->with('series')->get();
        }
        else
        {
            $movies = $movies->with('movie')->get();
            $series = $series->with('series')->get();
        }

        $request->flash();

        return view('pages.index')
            ->with('title', $title)
            ->with('heading', $heading)
            ->with('movies', $movies)
            ->with('series', $series);
    }
}
