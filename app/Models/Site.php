<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $table = "sites";
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
