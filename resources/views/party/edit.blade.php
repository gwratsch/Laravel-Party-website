@extends('layout')

@section('headtitle', 'Party')
@section('classPageName','partyEdit')
@section('header')
@endsection

@section('title')
Party edit Page
@endsection

@section('section')

<form method="post" action="/party">
    @csrf

    <label ref='patyinfo' ></label>
    <textarea name='patyinfo' >{{old('patyinfo')}}</textarea>
    <label ref='location' ></label>
    <textarea name='location' >{{old('location')}}</textarea>      
    <button type="submit" name="submit">Create Party</button>
</form>
<lu>
    @foreach($parties as $party)
    <li>$party</li>
    @endforeach
</lu>
@endsection
