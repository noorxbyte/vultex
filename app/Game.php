<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $primaryKey = 'product_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'poster',
        'release_date', 
        'platform_id',
    ];

    /**
     * Get the product info of game
     *
     */
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    /**
     * Get the platform of game
     *
     */
    public function platform()
    {
        return $this->belongsTo('App\Platform');
    }
}
