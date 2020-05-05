<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * Get the client record associated with the coupon.
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
