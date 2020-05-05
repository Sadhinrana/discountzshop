<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    /**
     * Get the product that owns the auction.
     */
    public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }

    /**
     * Get the application record associated with the auction.
     */
    public function application()
    {
        return $this->hasMany('App\Model\Product\Auctionapplication');
    }
}
