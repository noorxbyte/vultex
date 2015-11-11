<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'product_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'poster',
        'imdb', 
        'release_year', 
        'genre', 
        'language_id', 
        'quality_id'
    ];

    /**
     * Get the product info of series
     *
     */
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    /**
     * Get the language of series
     *
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * Get the quality of series
     *
     */
    public function quality()
    {
        return $this->belongsTo('App\Quality');
    }
}
