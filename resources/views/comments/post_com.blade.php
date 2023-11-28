@extends('layout')

@section('title', 'Post comments')

@section('content')
  <h1>Post comments</h1>
  <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
        <a href="/users/{{$post->user->id}}">{{$post->user->name}} {{$post->user->lastname}}</a>
        <a href="/users/{{$post->user->id}}/posts/{{$post->id}}/edit">&#9998;</a>
      <a href="/users/{{$post->user->id}}/posts/{{$post->id}}/delete">&#10006;</a><br>
        <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
          <p style='font-weight: bold;'>{{$post->title}}<p>
          <p>{{$post->content}}<p>
          <p style='font-style: italic;'>{{$post->created_at}}<p>
        </div>
    </div><br>
    <a href="/users/{{$post->user->id}}/post/{{$post->id}}/create" style='border: 1px solid black; border-radius: 3px; margin-left: 20px;'>
          Add comment
        </a><br><br> 
  @if(count($comments) == 0)
    <p>У постов нет комментариев</p>
  @else
    @foreach($comments as $com)
      <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
        <p>{{$com->content}}</p>
        <p style='font-style: italic;'>{{$com->created_at}} <a href="/users/{{$post->user->id}}/post/{{$post->id}}/comment/{{$com->id}}/delete">&#10006;</a><br><p>    
      </div><br>
    @endforeach 
  @endif



@endsection 