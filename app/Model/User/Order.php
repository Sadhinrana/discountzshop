<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the orderDetails record associated with the order.
     */
    public function orderDetails()
    {
        return $this->hasMany('App\Model\User\Orderdetail');
    }

    /**
     * Get the payment that owns the order.
     */
    public function payment()
    {
        return $this->hasOne('App\Model\User\Payment');
    }

    /**
     * Get the client that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the billing record associated with the order.
     */
    public function billing()
    {
        return $this->hasOne('App\Model\User\Billing');
    }

    /**
     * Get the shipping record associated with the order.
     */
    public function shipping()
    {
        return $this->hasOne('App\Model\User\Shipping');
    }
}
