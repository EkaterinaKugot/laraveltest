@extends('layout')

@section('title', "Edit a post")

@section('content')

<h1>Edit a post</h1>

<div>
      
</div>
<form method="post" action="/users/{{$id}}/posts/{{$post->id}}/edit">
    @csrf
<div>
      <label>Title</label>
      <input type="text" name="title" value="{{$post->title}}">
      @error('title')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>Content</label>
      <textarea style='resize: none;' rows="4" cols="35" name="content">
      {{$post->content}}
      </textarea>
      @error('content')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
      <button type="submit" name="button">Update</button>
</form>

@endsection