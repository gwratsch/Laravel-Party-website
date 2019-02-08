<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = [];

    public function party(){
        return $this->belongsTo('App\party');
    }
    /**
     * 
     * @param type $attributes
     * @return type interger or boolean
     */
    public function IsParticipantCreated($attributes){
        $party_id = Participant::where('user_id', $attributes['user_id'])
        ->where('party_id',$attributes['party_id'])
        ->value('id');
        return $party_id;
    }
    public function Createparticipant($attributes){
        Participant::create($attributes);
    }
}
