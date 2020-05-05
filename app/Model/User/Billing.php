<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    /**
     * Get the order record associated with the Payment.
     */
    public function order()
    {
        return $this->belongsTo('App\Model\User\Order');
    }
}
