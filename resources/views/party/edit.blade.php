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
    <form method="post" action="/participant/create">
         @csrf
         <input type="hidden" name="party_id" value={{$parties->id}}>
         <div class="field ">
            <label ref="email">E-mail deelnemer</label>
            <div class="control">
               <input type="email" name="email">
            </div>
         </div>
         <div class="field ">
             <div class="control">
                <button class="submit button" type="submit">Opslaan</button>
            </div>
         </div>
    </form>
    @if($parties->participant->count())
    <table class="box table">
        <thead>
            <tr class="tablerow">
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($parties->participant as $participant)
            <tr class="tablerow">
                <td>{{$participant->email}}</td>
                <td><a href="/participant/{{$participant->rowid}}/delete" >Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
