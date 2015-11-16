<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\StoreGameRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Genre;
use App\Video;
use App\Game;

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
        if (empty($request->type) || !in_array($request->type, ['movie', 'series', 'anime', 'video', 'game']))
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
            case 'game':
                $name = $namePlaceHolder = ucfirst($request->type) . ' Title';
                $description = 'Description';
                $type = 'game';
                break;
            default:
                return redirect()->back();
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
            case 'GAME':
                $valRequest = new StoreGameRequest;
                $this->validate($request, $valRequest->rules());
                $info = new Game($request->all());
                break;
        }

        if (in_array($request->type, ['MOVIE', 'SERIES', 'ANIME', 'VIDEO']))
            $this->StoreVideo($request, $info);
        else if ($request->type == "GAME")
            $this->StoreGame($request, $info);

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
    public function show(Request $request, $id)
    {
    	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (empty($request->type) || !in_array($request->type, ['movie', 'series', 'anime', 'video', 'game']))
            return redirect()->route('products.index');

        $product = Product::with('video')->find($id);

        $vid_type = $request->type;
        $title = $heading = 'Edit ' . ucfirst($request->type);

        switch ($product->type)
        {
        	case 'MOVIE':
            case 'SERIES':
            case 'ANIME':
            case 'VIDEO':
                $type = 'video';
                break;
            case 'GAME':
                $type = 'game';
                break;
            default:
            	return redirect()->back();
        }

        return view('products.edit', compact('title', 'heading', 'vid_type', 'type', 'name', 'namePlaceHolder', 'description', 'product'));
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

    public function StoreVideo(Request $request, $info)
    {
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

            if (filter_var($info->poster, FILTER_VALIDATE_URL) !== false && !empty($info->imdb))
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
    }

    public function StoreGame(Request $request, $info)
    {
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

            if (filter_var($info->poster, FILTER_VALIDATE_URL) !== false)
            {
                // download the poster
                if (!file_exists('/img/games/' . $info->product_id . '.jpg'))
                {
                    $buffer = file_get_contents($info->poster);
                    $file = fopen(public_path() . '/img/games/' . $info->product_id . '.jpg', 'w+');
                    fwrite($file, $buffer);
                    fclose($file);
                }

                // set the poster url
                $info->poster = '/img/games/' . $info->product_id . '.jpg';
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
    }
}
