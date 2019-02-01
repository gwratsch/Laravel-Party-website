@extends('layouts.layout')

@section('headtitle', 'Party')
@section('classPageName','create')
@section('header')
@endsection

@section('title')
Party Wishlists
@endsection

@section('section')
<div class="container">
    <h3>WishList create</h3>
    @foreach($parties as $party)
    <li>{{$party}}</li>
    @endforeach
</div>
@endsection