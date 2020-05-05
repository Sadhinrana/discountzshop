<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the product record associated with the category.
     */
    public function products()
    {
        return $this->hasMany('App\Model\Product\Product');
    }

    /**
     * Get the blog record associated with the category.
     */
    public function blogs()
    {
        return $this->hasMany('App\Model\Siteinfo\Blog');
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function childs() {
        return $this->hasMany('App\Model\Product\Category','parent_id','id') ;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function parent() {
        return $this->belongsTo('App\Model\Product\Category','parent_id','id') ;
    }
}
