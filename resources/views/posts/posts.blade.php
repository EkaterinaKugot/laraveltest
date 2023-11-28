@extends('layout')

@section('title', 'All posts')

@section('content')
  <h1>All posts</h1>   
  @if(count($posts) == 0)
    <p>Поcтов нет</p>
  @else
    @foreach($posts as $post)
      <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
        <a href="/users/{{$post->user->id}}">{{$post->user->name}} {{$post->user->lastname}}</a><br>
        <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
          <p style='font-weight: bold;'>{{$post->title}}<p>
          <p>{{$post->content}}<p>
          <p style='font-style: italic;'>{{$post->created_at}}<p>
        </div>
        <p style='margin-top: 10px; margin-bottom: 10px;'><span >
          <a href="/users/{{$post->user->id}}/post/{{$post->id}}" style='border: 1px solid black; border-radius: 3px; '>
          View comments
        </a>
          <a href="/users/{{$post->user->id}}/post/{{$post->id}}/create" style='border: 1px solid black; border-radius: 3px; margin-left: 20px;'>
          Add comment
        </a>
        </span></p> 
      </div><br>
    @endforeach 
  @endif

@endsection 

