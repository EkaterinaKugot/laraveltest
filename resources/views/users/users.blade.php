@extends('layout')

@section('title', 'All Users')

@section('content')
  <h1>All Users</h1>   
  <ul>
  @if(count($users) == 0)
    <li>Пользователей нет</li>
  @else
    @foreach($users as $user)
      <li><a href="/users/{{$user->id}}">{{$user->name}} {{$user->lastname}}</a>  <a href="/users/{{$user->id}}/edit">&#9998;</a>
      <a href="/users/{{$user->id}}/delete">&#10006;</a></li>
    @endforeach 
    <p><a href="/users_create" style='border: 1px solid black; border-radius: 3px;'>Add a user</a></p>
  @endif
  </ul>
@endsection 

