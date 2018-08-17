<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public function forumposts(){
        $this->hasMany('App\Forumpost');
    }
}
