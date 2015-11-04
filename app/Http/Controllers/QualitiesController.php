<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreQualityRequest;
use App\Http\Controllers\Controller;

use App\Quality;

class QualitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all qualities from database
        $qualities = Quality::all();

        return view('qualities.index')
            ->with('title', 'Qualities')
            ->with('heading', 'Qualities')
            ->with('qualities', $qualities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualities.create')
            ->with('title', 'New Quality')
            ->with('heading', 'Add New Quality');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQualityRequest  $request
     * @return Response
     */
    public function store(StoreQualityRequest $request)
    {
        // create the Quality
        Quality::create($request->all());

        // flash message
        session()->flash('flash_message', 'Quality added successfully.');

        return redirect()->route('qualities.create');
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
        // get quality
        $quality = Quality::find($id);
        if ($quality === null)
            return redirect()->route('qualities.index')->withErrors(['error' => 'Quality does not exist.']);
        
        return view('qualities.edit')
            ->with('title', 'Edit Quality')
            ->with('heading', 'Edit Quality')
            ->with('quality', $quality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQualityRequest $request, $id)
    {
        Quality::find($id)->update($request->all());

        // flash message
        session()->flash('flash_message', 'Quality updated successfully.');

        return redirect()->route('qualities.index');
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
