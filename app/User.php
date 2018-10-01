<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token', 'pivot'
    ];

    public function editors()
    {
        return $this->belongsToMany('App\Editor', 'editors_followers', 
            'editors_id', 'followers_id');
    }

    public function messages()
    {
        return $this->belongsToMany('App\Message', 'messages_followers', 
            'message_id', 'follower_id');
    }
}
