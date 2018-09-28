<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    public function users()
	{
    	return $this->belongsToMany('App\User', 'editors_followers', 
      		'editors_id', 'followers_id');
	}
}
