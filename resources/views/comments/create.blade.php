@extends('layout')

@section('title', "Add a comment")

@section('content')

<h1>Add a comment</h1>

<div>
      
</div>
<form method="post" action="/users/{{$id}}/post/{{$idp}}">
    @csrf
<div>
      <label>Content</label>
      <textarea style='resize: none;' rows="4" cols="35" name="content" value="{{ old('content') }}">
      </textarea>
      @error('content')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
      <button type="submit" name="button">Сreate</button>
</form>

@endsection