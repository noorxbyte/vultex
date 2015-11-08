<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Series;
use App\Movie;

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
        if (empty($request->type) || !in_array($request->type, ['movie', 'series']))
            return redirect()->route('products.index');

        $type = $request->type;
        $title = $heading = 'New ' . ucfirst($request->type);
        switch ($request->type)
        {
            case 'movie':
                $name = $namePlaceHolder = ucfirst($request->type) . ' Title';
                $description = 'Plot';

            case 'series':
                $name = $namePlaceHolder = ucfirst($request->type) . ' Title';
                $description = 'Plot';
        }

        return view('products.create', compact('title', 'heading', 'type', 'name', 'namePlaceHolder', 'description'));
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
                $movRequest = new StoreMovieRequest;
                $this->validate($request, $movRequest->rules());
                $info = new Movie($request->all());
                break;
            case 'SERIES':
                $tvRequest = new StoreSeriesRequest;
                $this->validate($request, $tvRequest->rules());
                $info = new Series($request->all());
                break;
        }

        // create product record
        $product = Product::create($request->all());

        // use database transaction to save the records
        DB::transaction(function () use ($product, $info) {
            // save the product record
            $product->save();

            // set the product id of the details record
            $info->product_id = $product->id;

            // save the details record
            $info->save();
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
        $product = Product::find($id);

        switch($product->type)
        {
            case "MOVIE":
                $product = Product::with('movie')->find($id);
                break;

            case "SERIES":
                $product = Product::with('series')->find($id);
                break;
        }

        $type = strtolower($product->type);

        return view('products.edit')
            ->with('title', 'Edit Product')
            ->with('heading', 'Edit Product')
            ->with('product', $product)
            ->with('type', $type);
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
        // validate request further according to type
        switch ($request->type)
        {
            case 'MOVIE':
                $movRequest = new UpdateMovieRequest;
                $request->merge($request->movie);
                $this->validate($request, $movRequest->rules());
                $info = Movie::find($id)->first();
                break;
            case 'SERIES':
                $tvRequest = new UpdateSeriesRequest;
                $request->merge($request->series);
                $this->validate($request, $tvRequest->rules());
                $info = Series::find($id)->first();
                break;
        }

        // use database transaction to save the records
        DB::transaction(function () use ($info, $request, $id) {
            // save the product record
            Product::find($id)->update($request->all());

            // save the details record
            $info->update($request->all());
        });

        // flash message
        session()->flash('flash_message', 'Product updated successfully.');

        return redirect()->route('home');
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
