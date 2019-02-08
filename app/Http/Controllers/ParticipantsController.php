<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Party;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\participants;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantslist = Participant::where('user_id', auth()->id())->get();
        return view('participant.index', compact('participantslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       if(auth::id() > 0 ){

            $parties = Party::findOrFail($request->party_id);
            $parties->partyWishlist;
            $user = (new User)->ParticipantUser($request);

            $participant_Id = (new participants)->participantExist(array('parties'=>$parties, 'user'=>$user));

            if(! $participant_Id > 0){
                (new participants)->participantCreate(array('parties'=>$parties, 'user'=>$user));
            }
            $parties->participant;

            return view('party.edit', compact('parties'));


      }else{
            return redirect('/');
       }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth::id() > 0 ){
            return redirect('/party');
        }else{
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        $participants = $participant->findOrFail($participant->id);
        if($participants->user_id == auth::id()){
            return view('participant.show', compact('$participants'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        $participants = $participant->findOrFail($participant->id);
        if($participants->user_id == auth::id()){
            return view('participant.edit', compact('participants'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        $parties = Party::findOrFail($participant->party_id);    
        if($parties->user_id == auth::id()){
            $participant->delete();
            return redirect('/party/'.$participant->party_id.'/edit');  
        }else{
            return redirect('/');
        }
    }
}
