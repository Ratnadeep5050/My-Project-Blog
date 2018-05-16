<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){                     // Every post belongs to a user, only one user that is why user(), not users() 
    	return $this->belongsTo('App\User');
    }
}
