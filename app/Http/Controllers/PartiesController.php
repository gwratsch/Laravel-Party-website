<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Party;
use App\wishlist;

class PartiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::where('user_id', auth()->id())->get();
        return view('party.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::id() > 0 ){
            return view('party.create');
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
    public function store()
    {
        
        if(auth::id() > 0 ){
            $attributes = request()->validate([
                'partyinfo'=>['required'],
                'location'=>['required']
            ]);
            $attributes['user_id']= auth()->id();
            $newParty = Party::create($attributes);
            $attributes['tickets'] = request()->tickets ? TRUE: FALSE;
            $newParty->addPartyWishlist($attributes);
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
    public function show(Party $party)
    {
        
        $parties = $party->findOrFail($party->id);
        if($parties->user_id == auth::id()){
            return view('party.show', compact('party'));
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
    public function edit(Party $party)
    {
        $parties = $party->findOrFail($party->id);
        if($parties->user_id == auth::id()){
            $parties->partyWishlist;
            $parties->participant;
            return view('party.edit', compact('parties'));
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
    public function update(Party $party)
    {
        
        if($party->user_id == auth::id()){
            $party->update(request(['partyinfo','location']));
            $party->UpdatePartyWishlist(request());
            return redirect('/party');
        }else{
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        if($party->user_id == auth::id()){
            $party->delete();
            return redirect('/party');  
        }else{
            return redirect('/');
        }
    }
}
