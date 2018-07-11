<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function photos(){
        return $this->hasMany('App\Photo','book_id');
    }

}
