<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the admins record associated with the roles.
     */
    public function admins()
    {
        return $this->belongsToMany('App\Admin');
    }
}
