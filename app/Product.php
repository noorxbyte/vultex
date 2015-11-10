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
     * Get the video
     *
     */
    public function video()
    {
    	return $this->hasOne('App\Video', 'product_id');
    }
}
