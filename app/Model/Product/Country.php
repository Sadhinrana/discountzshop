<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get the product record associated with the country.
     */
    public function products()
    {
        return $this->hasMany('App\Model\Product\Product');
    }
}
