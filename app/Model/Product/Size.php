<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * Get the product record associated with the size.
     */
    public function products()
    {
        return $this->belongsToMany('App\Model\Product\Product');
    }
}
