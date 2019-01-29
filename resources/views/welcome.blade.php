@extends('layouts.layout')

@section('headtitle', 'Welcome Party page')
@section('classPageName','home')
@section('header')
@endsection

@section('title')
Welkom on the Party Page
@endsection

@section('section')
    <h3>Aangemaakte party.</h3>
    <table class="table">
        <thead>
            <tr >
                <th>User id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>

        </thead>
        
        @foreach($users as $user)
            <tr >
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>    
        @endforeach
        
    </table>

@endsection
