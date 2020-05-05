<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Get the product record associated with the color.
     */
    public function products()
    {
        return $this->belongsToMany('App\Model\Product\Product');
    }
}
