<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;

class PartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$parties = Party::all();
        $parties = Party::where('user_id', auth()->id())->get();

        //$parties = auth()->user()->parties;
        return view('party.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'partyinfo'=>['required'],
            'location'=>['required']
        ]);
        $attributes['user_id']= auth()->id();
        Party::create($attributes);
        return redirect('/party');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //$parties = $party->findOrFail($id);
       // $parties = Party::all();

        return view('party.show', compact('party'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
            $parties = Party::all();
        return view('party.edit', compact('parties'));
         * 
         */
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
        $party->update(request(['partyinfo','location']));
        return redirect('/party');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $party->delete();
        return redirect('/party');  
    }
}
