<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VideosRequest;
use App\Http\Controllers\Controller;

use App\Language;
use App\Product;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VideosRequest $request)
    {
        // get all anime
        $anime = Product::join('videos as v', 'v.product_id', '=', 'id')->where('type', 'ANIME');

        $heading = 'Anime';

        // query
        if (!empty($request->q))
            $anime = $anime->where('name', 'LIKE', '%' . $request->q . '%');

        // language
        // if (!empty($request->language))
        // {
        //     $anime = $anime->where('v.language_id', Language::where('name', $request->language)->first()->id);
        //     $heading = $request->language . ' Anime';
        // }

        // sort
        if (!empty($request->sort))
            $anime = $anime->orderBy($request->sort, $request->order);
        else
            $anime = $anime->orderBy('v.updated_at', 'desc');

        // flash input
        $request->flash();

        return view('anime.index')
            ->with('title', 'Anime')
            ->with('heading', $heading)
            ->with('anime', $anime->paginate(env('PAGINATE')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
