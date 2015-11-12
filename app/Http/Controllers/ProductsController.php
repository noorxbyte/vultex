<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Genre;
use App\Video;

use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (empty($request->type) || !in_array($request->type, ['movie', 'series', 'anime', 'video']))
            return redirect()->route('products.index');

        $vid_type = $request->type;
        $title = $heading = 'New ' . ucfirst($request->type);
        switch ($request->type)
        {
            case 'movie':
            case 'series':
            case 'anime':
            case 'video':
                $name = $namePlaceHolder = ucfirst($request->type) . ' Title';
                $description = 'Plot';
                $type = 'video';
                break;
        }

        return view('products.create', compact('title', 'heading', 'vid_type', 'type', 'name', 'namePlaceHolder', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // validate request further according to type
        switch ($request->type)
        {
            case 'MOVIE':
            case 'SERIES':
            case 'ANIME':
            case 'VIDEO':
                $valRequest = new StoreVideoRequest;
                $this->validate($request, $valRequest->rules());
                $info = new Video($request->all());
                break;
        }

        // get the genres
        $genres = str_getcsv($request->genre);
        foreach ($genres as $key => $genre)
            $genres[$key] = trim($genre);

        // create product record
        $product = Product::create($request->all());

        // use database transaction to save the records
        DB::transaction(function () use ($product, $info, $genres) {
            // save the product record
            $product->save();

            // set the product id of the details record
            $info->product_id = $product->id;

            if (!empty($info->imdb) && $info->poster !== "N/A" && !empty($info->poster))
            {
                // download the poster
                if (!file_exists('/img/posters/' . $info->imdb . '.jpg'))
                {
                    $buffer = file_get_contents($info->poster);
                    $file = fopen(public_path() . '/img/posters/' . $info->imdb . '.jpg', 'w+');
                    fwrite($file, $buffer);
                    fclose($file);
                }

                // set the poster url
                $info->poster = '/img/posters/' . $info->imdb . '.jpg';
            }

            // save the details record
            $info->save();

            // add the genres
            foreach($genres as $genre)
            {
                // if genre does not exist create it
                $record = Genre::where('name', $genre)->first();
                if ($record === null)
                {
                    $record = Genre::create(['name' => $genre]);
                    $product->genres()->attach([$record->id]);
                }
                else
                {
                    $product->genres()->attach([$record->id]);
                }
            }
        });

        // flash message
        session()->flash('flash_message', 'Product added successfully.');

        return redirect()->route('products.create', ['type' => strtolower($request->type)]);
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
    public function update(StoreProductRequest $request, $id)
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
