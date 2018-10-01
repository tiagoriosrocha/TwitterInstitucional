<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Editor;

class Message extends Model
{
    public function editor()
	{
    	return $this->belongsTo(Editor::class);
	}

	public function readers(){
		return $this->belongsToMany('App\User', 'messages_followers', 
      		'messages_id', 'followers_id');
	}
}
