<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active', 'type', 'name', 'description', 'price'];

    /**
     * Get the movies info of movie
     *
     */
    public function movies()
    {
    	return $this->hasMany('App\Movie');
    }

    /**
     * Get the series info of movie
     *
     */
    public function series()
    {
        return $this->hasMany('App\Series');
    }
}
