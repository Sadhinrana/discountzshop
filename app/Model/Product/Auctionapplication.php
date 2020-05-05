<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Auctionapplication extends Model
{
    /**
     * Get the user that owns the auctionapplication.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the auction that owns the auctionapplication.
     */
    public function auction()
    {
        return $this->belongsTo('App\Model\Product\Auction');
    }
}
