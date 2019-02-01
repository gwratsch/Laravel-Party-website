<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $guarded = [];
    public function partyWishlist(){
        return $this->hasOne('App\Wishlist');
    }
    public function addPartyWishlist($wishlist){
        $attributes['party_id']= $this->id;
        $attributes['user_id']= $wishlist['user_id'];
        $attributes['tickets']= $wishlist['tickets'];
        Wishlist::create($attributes);
    }
    public function UpdatePartyWishlist($request){
        $wishlist = $this->partyWishlist;
        $attributes['party_id']= $this->id;
        $attributes['user_id']= $this->user_id;
        $attributes['tickets']= $request['tickets'];
        $wishlist->update($attributes);
    }
}
