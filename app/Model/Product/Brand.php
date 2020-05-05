<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Get the product record associated with the brand.
     */
    public function products()
    {
        return $this->hasMany('App\Model\Product\Product');
    }
}
