<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Usershipping extends Model
{
    /**
     * Get the client that owns the billings address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
