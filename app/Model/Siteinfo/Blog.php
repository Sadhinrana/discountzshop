<?php

namespace App\Model\Siteinfo;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Product\Category');
    }

    /**
     * Get the comment record associated with the blog.
     */
    public function blogComments()
    {
        return $this->hasMany('App\Model\Siteinfo\Blogcomment');
    }
}
