<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VideosRequest;
use App\Http\Controllers\Controller;

use App\Language;
use App\Product;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VideosRequest $request)
    {
        // get all series
        $series = Product::join('videos as v', 'v.product_id', '=', 'id')->where('type', 'SERIES');

        $heading = 'Series';

        // query
        if (!empty($request->q))
            $series = $series->where('name', 'LIKE', '%' . $request->q . '%');

        // language
        if (!empty($request->language))
        {
            $series = $series->where('v.language_id', Language::where('name', $request->language)->first()->id);
            $heading = $request->language . ' Series';
        }

        // sort
        if (!empty($request->sort))
            $series = $series->orderBy($request->sort, $request->order);
        else
            $series = $series->orderBy('v.updated_at', 'desc');

        // flash input
        $request->flash();

        return view('series.index')
            ->with('title', 'Series')
            ->with('heading', $heading)
            ->with('series', $series->paginate(env('PAGINATE')));
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
