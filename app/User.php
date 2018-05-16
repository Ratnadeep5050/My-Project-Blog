<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;

    public function posts(){                  // User can have many posts that is why posts() not post()   
        return $this->hasMany('App\Post');    // user can have many posts
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
