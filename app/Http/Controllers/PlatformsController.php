<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Controllers\Controller;

use App\Platform;

class PlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all platforms from database
        $platforms = Platform::all();

        return view('platforms.index')
            ->with('title', 'Platforms')
            ->with('heading', 'Platforms')
            ->with('platforms', $platforms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platforms.create')
            ->with('title', 'New Platform')
            ->with('heading', 'Add New Platform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatformRequest $request)
    {
        // create the language
        Platform::create($request->all());

        // flash message
        session()->flash('flash_message', 'Platform added successfully.');

        return redirect()->route('platforms.create');
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
        // get platform
        $platform = Platform::find($id);
        if ($platform === null)
            return redirect()->route('platforms.index')->withErrors(['error' => 'Platform does not exist.']);
        
        return view('platforms.edit')
            ->with('title', 'Edit Platform')
            ->with('heading', 'Edit Platform')
            ->with('platform', $platform);
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
        Platform::find($id)->update($request->all());

        // flash message
        session()->flash('flash_message', 'Platform updated successfully.');

        return redirect()->route('platforms.index');
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
