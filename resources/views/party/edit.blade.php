@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','partyEdit')
@section('header')
@endsection

@section('title')
Party edit Page
@endsection

@section('section')
<div class="container">
    <h3>Party Info</h3>
    <div class="box">
        <form method="post" action="/party/{{$parties->id}}">
            @method('PATCH')
            @csrf
            <div class="field ">
                <label class="label">Party</label>
                <div class="control">
                    <textarea class="textarea" name="partyinfo">{{$parties->partyinfo}}</textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">Locatie</label>
                <div class="control">
                    <textarea class="textarea" name="location">{{$parties->location}}</textarea>
                </div>
            </div>
            <div class="field">
                <label ref='location' >tickets</label>
                <div class="control">
                    <select name="tickets">
                        <option value="0" @if(e($parties->partyWishlist->tickets)== 0) selected  @endif >Only you Create a wishlist</option>
                        <option value="1" @if(e($parties->partyWishlist->tickets) == 1) selected  @endif >all participants Create a wishlist</option>
                    </select>
                </div>
            </div> 
            <div class="field">
                <div class="control">
                    <button class="submit button is-link" type="submit">Update</button>
                </div>
            </div>    
        </form>
        <form method="post" action="/party/{{$parties->id}}">
            @method('DELETE')
            @csrf
            <button class="submit button" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
