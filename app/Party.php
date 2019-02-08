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
    public function participant(){
        return $this->hasMany('App\Participant')
                ->join('users','users.id','=','user_id')
                ->select('email','participants.id as rowid','participants.user_id','participants.party_id');
    }
    public function addparticipants($participant){
       $attributes['party_id']  = $this->party_id;
       $attributes['user_id']  = $this->user_id;
       $attributes['participate']  = $participant['participate'];
       $attributes['sendInvitation']  = $participant['sendInvitation'];
       Participant::create($attributes);
    }

}
