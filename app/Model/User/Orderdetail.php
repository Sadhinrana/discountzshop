<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    /**
     * Get the order that owns the orderDetails.
     */
    public function order()
    {
        return $this->belongsTo('App\Model\User\Order');
    }
}
