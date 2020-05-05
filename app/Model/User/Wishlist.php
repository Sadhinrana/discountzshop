<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * Get the client that owns the wishlist.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the product that owns the wishlist.
     */
    public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }
}
