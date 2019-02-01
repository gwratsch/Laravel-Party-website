@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','partyIndex')
@section('header')
@endsection

@section('title')
Party INDEX Page
@endsection

@section('section')
<div class="container">
    <h3>Aangemaakte parties.</h3>
    <table class="table">
        <thead>
            <tr >
                <th>Party id</th>
                <th>User</th>
                <th>Party info</th>
                <th>Location</th>
                <th></th>
            </tr>

        </thead>
        @if($parties)
            @foreach($parties as $party)
            <tr >
                <td >{{$party->id}}</td>
                <td >{{$party->user_id}}</td>
                <td >{{$party->partyinfo}}</td>
                <td >{{$party->location}}</td>
                <td ><a href="/party/{{$party->id}}/edit" >edit</a></td>
            </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection

