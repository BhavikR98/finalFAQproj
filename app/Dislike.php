<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function answer(){
        return $this->belongsTo('App\Answer');
    }
}
