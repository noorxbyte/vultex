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

    /**
     * Get the game
     *
     */
    public function game()
    {
        return $this->hasOne('App\Game', 'product_id');
    }

    /**
     * Get the genres of the product
     *
     */
    public function genres()
    {
        return $this->BelongsToMany('App\Genre')->withTimestamps();
    }
}
