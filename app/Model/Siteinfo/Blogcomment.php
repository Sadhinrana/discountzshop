<?php

namespace App\Model\Siteinfo;

use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    /**
     * Get the blog that owns the comment.
     */
    public function blog()
    {
        return $this->belongsTo('App\Model\Siteinfo\Blog');
    }
}
