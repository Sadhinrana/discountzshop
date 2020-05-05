<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    /**
     * Get the client record associated with the MembershipType.
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
