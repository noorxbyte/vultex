<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $movies = Movie::all();
        $series = Movie::all();

        $request->flash();

        return view('pages.index')
            ->with('title', 'Welcome')
            ->with('heading', 'Welcome')
            ->with('movies', $movies)
            ->with('series', $series);
    }
}
