<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded = [];
    
    public function party(){
        return $this->belongsTo('App\party');
    }
}
