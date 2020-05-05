<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'membership_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the coupon record associated with the client.
     */
    public function coupon()
    {
        return $this->belongsToMany('App\Model\Product\Coupon');
    }

    /**
     * Get the membership_type record associated with the client.
     */
    public function membership_type()
    {
        return $this->belongsTo('App\Model\User\MembershipType');
    }

    /**
     * Get the order record associated with the client.
     */
    public function order()
    {
        return $this->hasMany('App\Model\User\Order');
    }

    /**
     * Get the wishlist record associated with the client.
     */
    public function wishlist()
    {
        return $this->hasMany('App\Model\User\Wishlist');
    }

    /**
     * Get the billing record associated with the client.
     */
    public function billing()
    {
        return $this->hasOne('App\Model\User\Userbilling');
    }

    /**
     * Get the shipping record associated with the client.
     */
    public function shipping()
    {
        return $this->hasOne('App\Model\User\Usershipping');
    }

    /**
     * Get the payment record associated with the client.
     */
    public function payment()
    {
        return $this->hasOne('App\Model\User\Userpayment');
    }
}
