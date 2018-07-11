<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public function book(){
        return $this->belongsTo('App\book');
    }
}
