@extends('layout')

@section('title', "Add a post")

@section('content')

<h1>Add a post</h1>
 
<div>
      
</div>
<form method="post" action="/users/{{$id}}/posts">
    @csrf
<div>
      <label>Title</label>
      <input type="text" name="title" value="{{ old('title') }}">
      @error('title')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>Content</label>
      <textarea style='resize: none;' rows="4" cols="35" name="content" value="{{ old('content') }}">
      </textarea>
      @error('content')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>To publish</label>
      <input type="checkbox" name="is_published" value="1">
</div>
<br>
      <button type="submit" name="button">Сreate</button>
</form>

@endsection