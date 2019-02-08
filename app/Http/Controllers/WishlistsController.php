<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Wishlist;
use App\Party;

class WishlistsController extends Controller
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
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $parties = Party::findOrFail(request('party_id'));

        if(auth::id() > 0 ){
            return view('wishlist.create', compact('parties'));
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
            return redirect('/Wishlist');
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
    public function show(Wishlist $wishlist)
    {
        $wishlists = $wishlist->findOrFail($wishlist->id);
        if($wishlists->user_id == auth::id()){
            return view('wishlist.show', compact('wishlists'));
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
    public function edit(Wishlist $wishlist)
    {
        $wishlists = $wishlist->findOrFail($wishlist->id);
        if($wishlists->user_id == auth::id()){
            return view('wishlist.edit', compact('wishlists'));
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
    public function update(Wishlist $wishlists)
    {
        if($wishlists->user_id == auth::id()){
            return redirect('/wishlist');
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
    public function destroy(Wishlist $wishlists)
    {
        if($wishlists->user_id == auth::id()){
            $wishlists->delete();
            return redirect('/wishlist');  
        }else{
            return redirect('/');
        }
    }
}
