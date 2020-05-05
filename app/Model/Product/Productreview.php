<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Productreview extends Model
{
    /**
     * Get the blog that owns the comment.
     */
    public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }
}
