@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','partyCreate')
@section('header')
@endsection

@section('title')
Create a Party
@endsection

@section('section')
<div class="container">
    <h3>Party Info</h3>
    <div class="box">
        <form method="post" action="/party" class="box">
            @csrf
            <div class="field ">
                <label ref='partyinfo' >Party Informatie</label>
                <div class="control">
                    <textarea class="textarea" name='partyinfo' >{{old('partyinfo')}}</textarea>
                </div>
            </div>  
            <div class="field">
                <label ref='location' >Locatie</label>
                <div class="control">
                    <textarea class="textarea" name='location' >{{old('location')}}</textarea>  
                </div>
            </div>  
            <div class="field">
                <label ref='location' >tickets</label>
                <div class="control">
                    <select name="tickets">
                        <option value=TRUE selected>Only you Create a wishlist</option>
                        <option value=FALSE >all participants Create a wishlist</option>
                    </select>
                </div>
            </div>  
            <div class="field">  
                <div class="control">
                    <input type="submit" name="submit">
                </div>
            </div> 
        </form>
    </div>
</div>
@endsection
