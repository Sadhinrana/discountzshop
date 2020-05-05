<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Product\Category');
    }

    /**
     * Get the country that owns the product.
     */
    public function country()
    {
        return $this->belongsTo('App\Model\Product\Country');
    }

    /**
     * Get the vendor that owns the product.
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo('App\Model\Product\Brand');
    }

    /**
     * Get the wishlist record associated with the product.
     */
    public function wishlist()
    {
        return $this->hasOne('App\Model\User\Wishlist');
    }

    /**
     * Get the image record associated with the product.
     */
    public function images()
    {
        return $this->hasMany('App\Model\Product\Image');
    }

    /**
     * Get the review record associated with the product.
     */
    public function productreviews()
    {
        return $this->hasMany('App\Model\Product\Productreview');
    }

    /**
     * Get the color record associated with the product.
     */
    public function colors()
    {
        return $this->belongsToMany('App\Model\Product\Color');
    }

    /**
     * Get the size record associated with the product.
     */
    public function sizes()
    {
        return $this->belongsToMany('App\Model\Product\Size');
    }

    /**
     * Get the tag record associated with the product.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Product\Tag');
    }
}
