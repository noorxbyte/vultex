<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imdb', 
        'release_year', 
        'language_id', 
        'quality_id'
    ];

    /**
     * Get the product info of movie
     *
     */
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
