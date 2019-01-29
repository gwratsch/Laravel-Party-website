@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','show')
@section('header')
@endsection

@section('title')
Party Show Page
@endsection

@section('section')
<div class="container">
    <h3>Party Info</h3>
    <div class="box">
        <form method="post" action="/party/{{$party->id}}">
            @method('PATCH')
            @csrf
            <div class="field ">
                <label class="label">Party</label>
                <div class="control">
                    <textarea class="textarea" name="partyinfo">{{$party->partyinfo}}</textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">Locatie</label>
                <div class="control">
                    <textarea class="textarea" name="location">{{$party->location}}</textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="submit button is-link" type="submit">Update</button>
                </div>
            </div>    
        </form>
        <form method="post" action="/party/{{$party->id}}">
            @method('DELETE')
            @csrf
            <button class="submit button" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
