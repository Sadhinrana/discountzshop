<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the product record associated with the tag.
     */
    public function products()
    {
        return $this->belongsToMany('App\Model\Product\Product');
    }
}
