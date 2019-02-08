@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','create')
@section('header')
@endsection

@section('title')
Party Participants
@endsection

@section('section')
<div class="container">
    <h3>Participants create</h3>
    @foreach($parties as $party)
    <li>{{$party}}</li>
    @endforeach
</div>
@endsection