@extends('layout')

@section('title', 'All user posts')

@section('content')
  <h1>All user posts</h1>
  <a href="/users/{{$id}}/createpost" style='border: 1px solid black; border-radius: 3px;'>Добавить пост</a><br><br> 
  @if(count($posts) == 0)
    <p>У пользователя нет поcтов</p>
  @else
    @foreach($posts as $post)
      <div style='border: 1px solid black; border-radius: 3px; padding:4px;'>
        <a href="/users/{{$post->user->id}}">{{$post->user->name}} {{$post->user->lastname}}</a>
        <a href="/users/{{$id}}/posts/{{$post->id}}/edit">&#9998;</a>
        <a href="/users/{{$id}}/posts/{{$post->id}}/delete">&#10006;</a>
        <span>
          @if($post->is_published == 1)
            Published
          @else
            Not published
          @endif
        </span><br>
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