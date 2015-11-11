<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	protected $fillable = ['name'];

    /**
     * Get videos of the genre
     *
     */
    public function videos()
    {
    	$this->belongsToMany('App\Product');
    }
}
