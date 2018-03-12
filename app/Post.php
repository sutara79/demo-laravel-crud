<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 単数形 (従属の関係)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
