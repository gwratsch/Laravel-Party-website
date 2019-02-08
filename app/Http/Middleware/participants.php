<?php

namespace App\Http\Middleware;

use Closure;
use App\Participant;

class participants
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    public function participantExist($parties){
        //dd($parties);
        $ParticipantUserid = $parties['user']->id;
        $PartyUserid = $parties['parties']->user_id;
        $logedinUserId = auth()->id();
        $participant_id=0;
        If($PartyUserid == $logedinUserId){
            $attributes['user_id']= $ParticipantUserid;
            $attributes['party_id']= $parties['parties']->id;
            $participant_id = (new Participant)->IsParticipantCreated($attributes);
        }
        return $participant_id;
    }
    public function participantCreate($parties){
        $ParticipantUserid = $parties['user']->id;
        $attributes['participate']  = FALSE;
        $attributes['sendInvitation']  = now();
        $attributes['party_id']  = $parties['parties']->id;
        $attributes['user_id']  = $ParticipantUserid;

        (new Participant)->Createparticipant($attributes);
    }
}
