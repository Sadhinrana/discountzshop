<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }
}
