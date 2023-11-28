@extends('layout')

@section('title', 'Users Info')

@section('content')
  <h1>Users Info</h1>   

  <p>Name: {{$user->name}} {{$user->lastname}} <a href="/users/{{$user->id}}/edit">&#9998;</a>
      <a href="/users/{{$user->id}}/delete">&#10006;</a></p>
  <p>Roles: 
  @foreach($user->roles as $role)
      {{$role->name}}  
    @endforeach
  </p>
  <p>Age: {{$user->age}}</p>
  <p>City: {{$user->city}}</p>
  <p>Email: {{$user->email}}</p>
  <br>

  <a href="/users/{{$user->id}}/createpost" style='border: 1px solid black; border-radius: 3px;'>Добавить пост</a>
  <a href="/users/{{$user->id}}/posts" style='margin-left:20px; border: 1px solid black; border-radius: 3px;'>Просмотреть все посты</a>
  <br>
  <h2>Комментарии к пользователю</h2>
  <p><a href="/users/{{$user->id}}/post/0/create" style='border: 1px solid black; border-radius: 3px;'>Добавить комментарий к пользователю
  </a></p>
  @if(count($comments) == 0)
    <p>Комментариев нет</p>
  @else
  @foreach($comments as $com)
      <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
        <p>{{$com->content}}</p>
        <p style='font-style: italic;'>{{$com->created_at}} <a href="/users/{{$user->id}}/post/0/comment/{{$com->id}}/delete">&#10006;</a><br><p>    
      </div><br>
    @endforeach
  @endif
@endsection
