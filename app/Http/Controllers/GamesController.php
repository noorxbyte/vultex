<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GamesRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Platform;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GamesRequest $request)
    {
        $games = Product::join('games as g', 'g.product_id', '=', 'id');

        $games = $games->where('type', 'GAME');
        $title = 'Game';
        $heading = 'Game';

        // platform
        if (!empty($request->platform))
        {
            $games = $games->where('g.platform_id', Platform::where('name', $request->platform)->first()->id);
            $heading = $request->platform . ' ' . $heading + 's';
        }

        // query
        if (!empty($request->q))
            $games = $games->where('name', 'LIKE', '%' . $request->q . '%');

        // sort
        if (!empty($request->sort))
            $games = $games->orderBy($request->sort, $request->order);
        else
            $games = $games->orderBy('g.updated_at', 'desc');

        // flash input
        $request->flash();

        return view('games.index')
            ->with('title', $title)
            ->with('heading', $heading)
            ->with('games', $games->paginate(env('PAGINATE')));
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
