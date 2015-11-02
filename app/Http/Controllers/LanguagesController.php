<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Controllers\Controller;

use App\Language;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all languages from database
        $languages = Language::all();

        return view('languages.index')
            ->with('title', 'Languages')
            ->with('heading', 'Languages')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create')
            ->with('title', 'New Language')
            ->with('heading', 'Add New Language');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLanguageRequest  $request
     * @return Response
     */
    public function store(StoreLanguageRequest $request)
    {
        // create the language
        Language::create($request->all());
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
        // get language
        $language = Language::find($id);
        if ($language === null)
            return redirect()->route('languages.index')->withErrors(['error' => 'Language does not exist.']);
        
        return view('languages.edit')
            ->with('title', 'Edit Language')
            ->with('heading', 'Edit Language')
            ->with('language', $language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLanguageRequest $request, $id)
    {
        Language::find($id)->update($request->all());

        return redirect()->route('languages.index');
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