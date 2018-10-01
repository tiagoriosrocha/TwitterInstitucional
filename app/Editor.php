<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Editor extends Model
{
    public function followers()
	{
    	return $this->belongsToMany('App\User', 'editors_followers', 
      		'editors_id', 'followers_id');
	}

	public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
