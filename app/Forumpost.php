<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forumpost extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function publication(){
    	return $this->belongsTo('App\Publication');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
