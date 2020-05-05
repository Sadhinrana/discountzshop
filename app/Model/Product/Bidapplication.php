<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Bidapplication extends Model
{
    /**
     * Get the vendor that owns the auctionapplication.
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    /**
     * Get the bid that owns the bidapplication.
     */
    public function bid()
    {
        return $this->belongsTo('App\Model\Product\Bid');
    }
}
