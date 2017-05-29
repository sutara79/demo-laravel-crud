<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * Relation: Posts belongs to User.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
